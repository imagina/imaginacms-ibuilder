<?php

namespace Modules\Ibuilder\Entities;

use Modules\Core\Icrud\Entities\CrudModel;

class LayoutBlock extends CrudModel
{
  public $forceDeleting = true;
  protected $table = 'ibuilder__layout_blocks';
  public $transformer = 'Modules\Ibuilder\Transformers\LayoutBlockTransformer';
  public $repository = 'Modules\Ibuilder\Repositories\LayoutBlockRepository';
  public $requestValidation = [
    'create' => 'Modules\Ibuilder\Http\Requests\CreateLayoutBlockRequest',
    'update' => 'Modules\Ibuilder\Http\Requests\UpdateLayoutBlockRequest',
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
    'block_id',
    'sort_order',
    'parent_system_name',
    'grid_position',
    'system_name'
  ];
}
