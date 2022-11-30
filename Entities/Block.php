<?php

namespace Modules\Ibuilder\Entities;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;
use Modules\Media\Support\Traits\MediaRelation;

class Block extends CrudModel
{
  public $forceDeleting = true;
  use Translatable, MediaRelation;

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
  protected $fillable = ["system_name", "component", "entity", "attributes"];
  protected $casts = ['component' => 'array', 'entity' => 'array', 'attributes' => AsArrayObject::class];
}
