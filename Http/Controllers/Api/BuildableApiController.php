<?php

namespace Modules\Ibuilder\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Ibuilder\Entities\Buildable;
use Modules\Ibuilder\Repositories\BuildableRepository;

class BuildableApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Buildable $model, BuildableRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}