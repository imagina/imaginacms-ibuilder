<?php

namespace Modules\Ibuilder\Entities;

use Modules\Core\Icrud\Entities\CrudModel;

class Buildable extends CrudModel
{

  protected $table = 'ibuilder__buildables';
  public $transformer = 'Modules\Ibuilder\Transformers\BuildableTransformer';
  public $repository = 'Modules\Ibuilder\Repositories\BuildableRepository';
  public $requestValidation = [
    'create' => 'Modules\Ibuilder\Http\Requests\CreateBuildableRequest',
    'update' => 'Modules\Ibuilder\Http\Requests\UpdateBuildableRequest',
  ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  protected $fillable = [
    'layout_id',
    'entity_type',
    'entity_id',
    'type'
  ];

  public function layout()
  {
    return $this->hasOne(Layout::class, 'id', 'layout_id');
  }

}
