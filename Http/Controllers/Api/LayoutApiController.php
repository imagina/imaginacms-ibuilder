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
      $blocks = json_decode($layoutData["blocks"]);
      $response = [];
      //Parse To array the blocks and include relations data if needed
      foreach ($blocks as $block) {
        $hasPivot = isset($block->pivot);
        $response[] = array_merge(
          (array)$block, [
          "layout_id" => $hasPivot ? $block->pivot->layoutId : 0,
          "sort_order" => $hasPivot ? $block->pivot->sortOrder : 0,
          "parent_system_name" => $hasPivot ? $block->pivot->parentSystemName : 0,
          "grid_position" => $hasPivot ? $block->pivot->gridPosition : 0,
          "system_name" => $hasPivot ? $block->pivot->systemName : $block->systemName
        ]);
      }
      $blocks = orderBlocksToRender($response);
      //Render view
      return view('ibuilder::frontend.index', compact('layout', 'blocks'));
    } else {
      return response()->view('errors.404', [], 404);
    }
  }
}