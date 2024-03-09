<?php

namespace Modules\Ibuilder\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Ibuilder\Entities\LayoutBlock;
use Modules\Ibuilder\Repositories\LayoutBlockRepository;

class LayoutBlockApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(LayoutBlock $model, LayoutBlockRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
