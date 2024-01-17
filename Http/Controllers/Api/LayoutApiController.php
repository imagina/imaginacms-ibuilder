<?php

namespace Modules\Ibuilder\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
use Illuminate\Http\Request;

//Model
use Modules\Ibuilder\Entities\Layout;
use Modules\Ibuilder\Repositories\LayoutRepository;

class LayoutApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Layout $model, LayoutRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }

  public function layoutPreview(Request $request, $layoutId)
  {
    $layoutData = $request->all();

    if ($layoutData) {
      $layout = (object)$layoutData;
      $blocks = collect(json_decode($layout->blocks))->sortBy('sortOrder')->map(function ($item) {
        $attributes = (array)($item->attributes ?? []);
        $componentAttributes = (array)($attributes['componentAttributes'] ?? []);

        // Realizar el merge solo si existe 'componentAttributes' en $attributes
        if (isset($attributes['componentAttributes'])) {
          $attributes['componentAttributes'] = (object)(array_merge($componentAttributes , (array)($item)));
          unset($attributes['componentAttributes']->attributes, $attributes['componentAttributes']->gridPosition, $attributes['componentAttributes']->entity, $attributes['componentAttributes']->component);
        }

        return [
          "component" => $item->component ?? [],
          "entity" => $item->entity ?? [],
          "gridPosition" => $item->gridPosition,
          "attributes" => $attributes
        ];
      });
      //Render view
      return view('ibuilder::frontend.index', compact('layout', 'blocks'));
    } else {
      return response()->view('errors.404', [], 404);
    }
  }
}
