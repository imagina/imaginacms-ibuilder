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
  protected $fillable = ['system_name', 'entity_type', 'entity_id'];
}
