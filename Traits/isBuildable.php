<?php

namespace Modules\Ibuilder\Traits;

use Illuminate\Support\Str;
use Modules\Ibuilder\Entities\Buildable;

trait isBuildable
{

  public static function bootIsBuildable()
  {
    //Listen event after create model
    static::createdWithBindings(function ($model) {
      $model->handleChange($model->getEventBindings('createdWithBindings'));
    });
    //Listen event after update model
    static::updatedWithBindings(function ($model) {
      $model->handleChange($model->getEventBindings('updatedWithBindings'));
    });
    //Listen event after delete model
    static::deleted(function ($model) {
      $model->handleDeleted($model);
    });
  }

  public function buildable()
  {
    // Define and return the morphOne relationship
    return $this->morphOne(Buildable::class, 'entity');
  }

  /**
   * This method is responsible for retrieving the layout associated with a buildable entity.
   * If the buildable has a defined layout, it returns it. Otherwise, it fetches the layout
   * based on the type of the buildable entity from the LayoutRepository
   */
  public function getLayout()
  {
    //Validate if exist buildable
    if (!$this->buildable) return null;
    // Check if the buildable entity has a layout defined, and return it if found.
    if ($this->buildable->layout) return $this->buildable->layout;
    //Search the default layout
    $layoutRepositoy = app("Modules\Ibuilder\Repositories\LayoutRepository");
    $params = json_decode(json_encode([
      "filter" => [
        "field" => "entity_type",
        "type" => $this->buildable->type,
        "default" => 1
      ]
    ]));
    // Fetch the layout from the repository based on the type of the buildable entity.
    return $layoutRepositoy->getItem($this->getMorphClass(), $params);
  }

  /**
   * This method renders the layout associated with the current buildable entity.
   * It first retrieves the layout using the getLayout() method. If a valid layout
   * is found, it fetches the blocks to render from the layout and returns the
   * rendered view. If no valid layout is found, it either executes a callback
   * function if provided or returns a 404 error response.
   */
  public function renderLayout($callback = null, $viewParams = [])
  {
    // Retrieve the layout associated with the buildable entity.
    $layout = $this->getLayout();

    if ($layout && $layout->id) {
      $blocks = $layout->getBlocksToRender();
      $useLayout = 'layouts.master';
      return view('ibuilder::frontend.index', compact('layout', 'blocks', 'useLayout', 'viewParams'));
    }

    // If a callback function is provided and is callable, execute it.
    if ($callback && is_callable($callback)) {
      return $callback();
    }

    // If no valid layout is found and no callback is provided, return a 404 error response.
    return response()->view('errors.404', [], 404);
  }

  /**
   * This method is responsible for handling changes to the buildable entity.
   * It updates or creates a new Buildable model instance with the provided data.
   * The provided data should include information about the layout ID and type of
   * the buildable entity. If no data is provided or if the provided data is invalid,
   * no action is taken.
   */
  public function handleChange($params)
  {
    // Extract the data related to the buildable entity from the parameters.
    $data = $params["data"]["buildable"] ?? null;
    if ($data && $data['layout_id'] && $data["type"]) {
      // Update or create a new Buildable model instance with the provided data.
      Buildable::updateOrCreate(
        ['entity_type' => $this->getMorphClass(), 'entity_id' => $this->id],
        ['layout_id' => $data["layout_id"], 'type' => $data["type"]]
      );
    }
  }

  /**
   * This method is responsible for handling the deletion of the buildable entity.
   * It deletes the associated Buildable model instance based on the entity type
   * and entity ID of the current buildable entity.
   */
  public function handleDeleted($params)
  {
    Buildable::where('entity_type', $this->getMorphClass())
      ->where('entity_id', $this->id)->delete();
  }
}
