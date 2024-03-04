<?php

namespace Modules\Ibuilder\Traits;

use Illuminate\Support\Str;
use Modules\Ibuilder\Entities\Layout;
use Modules\Ibuilder\Entities\Buildable;

trait isBuildable
{

  public static function bootIsBuildable()
  {
    //Listen event after create model
    static::createdWithBindings(function ($model) {
      $model->handleCreate($model->getEventBindings('createdWithBindings'));
    });
    //Listen event after update model
    static::updatedWithBindings(function ($model) {
      $model->handleUpdate($model->getEventBindings('updatedWithBindings'));
    });
    //Listen event after delete model
    static::deleted(function ($model) {
      $model->handleDeleted($model);
    });
  }

  private function buildableRepository() {
    return app('Modules\Ibuilder\Repositories\BuildableRepository');
  }

  public function buildable()
  {
    return $this->morphOne(Buildable::class, 'entity')->with('layout');
  }

  public function layout()
  {
    $type = optional($this->buildable)->type;
    return optional($this->buildable)->layout ?? $this->getDefaultLayout($type);
  }

  public function getDefaultLayout($type = null)
  {
    $layoutRepositoy = app("Modules\Ibuilder\Repositories\LayoutRepository");
    $params = json_decode(json_encode([
      "filter" => [
        "field" => "entity_type",
        "type" => $type,
        "default" => 1
      ]
    ]));

    return $layoutRepositoy->getItem($this->getMorphClass(), $params);
  }

  public function renderLayout($callback = null)
  {
    $layout = $this->layout();

    if ($layout && $layout->id) {
      $blocks = $layout->getBlocksToRender();
      return view('ibuilder::frontend.index', compact('layout', 'blocks'));
    }

    if ($callback && is_callable($callback)) {
      return $callback();
    }

    return response()->view('errors.404', [], 404);
  }

  public function handleCreate($params)
  {
    $data = $params["data"]["buildable"] ?? null;
    if ($data) {
      $buildableRepository = $this->buildableRepository();
      $this->createBuildable($buildableRepository, $data);
    }

  }

  public function handleUpdate($params)
  {
    $data = $params["data"]["buildable"] ?? null;

    if (isset($data)) {
      $buildableRepository = $this->buildableRepository();
      $params = json_decode(json_encode([
        "filter" => [
          "field" => "entity_type",
          "entity_id" => $this->id
        ]
      ]));

      $response = $buildableRepository->getItem($this->getMorphClass(), $params);

      $layoutId = $data["layout_id"];
      $type = $data["type"];

      if (!$response) {
        $this->createBuildable($buildableRepository, $data);
      } else if($response["layout_id"] != $layoutId || $response["type"] !== $type) {
        $response->update([
          'layout_id' => $layoutId,
          'type' => $type
        ]);
      }
    }

  }

  public function handleDeleted($params)
  {
    Buildable::where('entity_type', $this->getMorphClass())
        ->where('entity_id', $this->id)->delete();
  }

  private function createBuildable($buildableRepository, $data) {
    $buildableRepository->create([
      'layout_id' => $data["layout_id"],
      'entity_type' => $this->getMorphClass(),
      'entity_id' => $this->id,
      'type' => $data["type"]
    ]);
  }
}
