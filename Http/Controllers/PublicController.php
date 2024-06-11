<?php

namespace Modules\Ibuilder\Http\Controllers;

use Illuminate\Http\Request;
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
            'component' => json_decode($params['component'] ?? '[]'),
            'entity' => json_decode($params['entity'] ?? '[]'),
            'attributes' => json_decode($params['attributes'] ?? '[]'),
        ];
        //Render view
        return view('ibuilder::frontend.blocks', compact('blockConfig'));
    }

    public function layoutPreview($layoutId)
    {
      $repositoryLayout = app("Modules\Ibuilder\Repositories\LayoutRepository");
      $params = ['include' => []];

      $layout = $repositoryLayout->getItem($layoutId, json_decode(json_encode($params)));

      if ($layout) {
        $blocks = $layout->getBlocksToRender();
        //Render view
        return view('ibuilder::frontend.index', compact('layout', 'blocks'));
      } else {
        return response()->view('errors.404', [], 404);
      }
    }
}
