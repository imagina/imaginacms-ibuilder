<?php

namespace Modules\Ibuilder\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Layout extends CrudModel
{
  use Translatable;

  protected $table = 'ibuilder__layouts';
  public $transformer = 'Modules\Ibuilder\Transformers\LayoutTransformer';
  public $repository = 'Modules\Ibuilder\Repositories\LayoutRepository';
  public $requestValidation = [
      'create' => 'Modules\Ibuilder\Http\Requests\CreateLayoutRequest',
      'update' => 'Modules\Ibuilder\Http\Requests\UpdateLayoutRequest',
    ];
  protected $with = ['blocks.fields'];
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
    return $this->hasMany(Block::class);
  }

  /**
   * Order and transform thje
   * @return mixed
   */
  public function getBlocksToRender()
  {
    return $this->blocks->sortBy('sort_order')->map(function($item) {
      return $item->getRenderData();
    });
  }
}
