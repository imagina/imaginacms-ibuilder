<?php

namespace Modules\Ibuilder\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;
use Modules\Media\Support\Traits\MediaRelation;

class Layout extends CrudModel
{
  use Translatable, MediaRelation;

  protected $table = 'ibuilder__layouts';
  public $transformer = 'Modules\Ibuilder\Transformers\LayoutTransformer';
  public $repository = 'Modules\Ibuilder\Repositories\LayoutRepository';
  public $requestValidation = [
    'create' => 'Modules\Ibuilder\Http\Requests\CreateLayoutRequest',
    'update' => 'Modules\Ibuilder\Http\Requests\UpdateLayoutRequest',
  ];
  protected $with = ['blocks', 'fields'];
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
  public $translatedAttributes = ['title'];
  protected $fillable = ['system_name', 'entity_type', 'type', 'default', 'status'];
  protected $singleFlaggableCombination = ['entity_type', 'type'];

  public function blocks()
  {
    return $this->belongsToMany(Block::class, 'ibuilder__layout_blocks')
      ->withPivot('id', 'sort_order', 'parent_system_name', 'grid_position', 'system_name');
  }

  /**
   * Order and transform thje
   * @return mixed
   */
  public function getBlocksToRender()
  {
    return orderBlocksToRender(blocksToArray($this->blocks), false);
  }
}
