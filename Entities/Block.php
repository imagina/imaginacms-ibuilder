<?php

namespace Modules\Ibuilder\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Block extends CrudModel
{
  use Translatable;

  protected $table = 'ibuilder__blocks';
  public $transformer = 'Modules\Ibuilder\Transformers\BlockTransformer';
  public $requestValidation = [
    'create' => 'Modules\Ibuilder\Http\Requests\CreateBlockRequest',
    'update' => 'Modules\Ibuilder\Http\Requests\UpdateBlockRequest',
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
  public $translatedAttributes = ["title"];
  protected $fillable = ["system_name", "component_name", "entity", "attributes"];
  protected $casts = ['entity' => 'array', 'attributes' => 'array'];

  public function getEntityAttribute($value)
  {
    if (is_string($value)) $value = json_decode($value);
    if (is_string($value->params)) $value->params = json_decode($value->params);
    return $value;
  }
}
