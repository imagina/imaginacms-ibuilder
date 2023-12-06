<?php

namespace Modules\Ibuilder\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;

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

  public function layoutPreview($layoutId)
  {
    $repositoryLayout = app("Modules\Ibuilder\Repositories\LayoutRepository");
    $params = ['include' => []];

    $layout = $repositoryLayout->getItem($layoutId, json_decode(json_encode($params)));

    $blocks = $layout->blocksToRender;
    //Render view
    return view('ibuilder::frontend.index', compact('layout', 'blocks'));
  }
}
