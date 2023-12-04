<?php

namespace Modules\Ibuilder\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Mockery\CountValidator\Exception;
use Route;
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

class PublicController extends BaseApiController
{
  public function __construct()
  {
    parent::__construct();
  }

  /*
  * Organization Index
  */
  public function blockPreview(Request $request)
  {
    $params = $request->all();
    //Instance the blockConfig
    $blockConfig = [
      "component" => json_decode($params['component'] ?? "[]"),
      "entity" => json_decode($params['entity'] ?? "[]"),
      "attributes" => json_decode($params['attributes'] ?? "[]")
    ];
    //Render view
    return view('ibuilder::frontend.blocks', compact('blockConfig'));
  }

  public function layoutPreview($layoutId)
  {
    $repositoryLayout = app("Modules\Ibuilder\Repositories\LayoutRepository");
    $params = [
      'include' => ['blocks']
    ];

    $layout =  $repositoryLayout->getItem($layoutId, json_decode(json_encode($params)));

    $blocks = $layout->blocks->sortBy('sort_order')->map(function($item) {
      return [
        "component" => $item->component ?? [],
        "entity" => $item->entity ?? [],
        "gridPosition" => $item->grid_position,
        "attributes" => (array)($item->attributes ?? [])
      ];
    });
    //Render view
    return view('ibuilder::frontend.index', compact('layout', 'blocks'));
  }
}
