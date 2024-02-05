<?php

namespace Modules\Ibuilder\Traits;

use Illuminate\Support\Str;
use Modules\Ibuilder\Entities\Layout;

trait Buildable
{
  public function layout()
  {
    return $this->morphOne(Layout::class, 'entity')->withDefault(function () {
      return $this->defaultLayout;
    });
  }

  public function getDefaultLayoutAttribute()
  {
    $layoutRepositoy = app("Modules\Ibuilder\Repositories\LayoutRepository");
    $params =  json_decode(json_encode([
      "filter" => [
        "field" => "entity_type",
        "entity_id" => null
      ]
    ]));

    return $layoutRepositoy->getItem($this->getMorphClass(), $params);
  }

  public function renderLayout($callback = null)
  {
    $layout = $this->layout;

    if($layout && $layout->id) {
      $blocks = $layout->blocksToRender();
      return view('ibuilder::frontend.index', compact('layout', 'blocks'));
    }

    if($callback && is_callable($callback)) {
      return $callback();
    }

    return response()->view('errors.404', [], 404);
  }
}
