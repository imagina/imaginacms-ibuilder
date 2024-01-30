<?php

namespace Modules\Ibuilder\Entities;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\Ifillable\Traits\isFillable;
use Illuminate\Support\Str;

class Block extends CrudModel
{
  public $forceDeleting = true;
  use Translatable, MediaRelation, isFillable;

  protected $table = 'ibuilder__blocks';
  public $transformer = 'Modules\Ibuilder\Transformers\BlockTransformer';
  public $repository = 'Modules\Ibuilder\Repositories\BlockRepository';
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
  public $translatedAttributes = ["internal_title"];
  protected $fillable = [
    "system_name",
    "status",
    "component",
    "entity",
    "attributes",
    "layout_id",
    "grid_position",
    "sort_order",
    "mobile_attributes"
  ];
  protected $casts = [
    'component' => 'array',
    'entity' => 'array',
    'attributes' => AsArrayObject::class
  ];

  public function layout()
  {
    return $this->belongsTo(Layout::class);
  }

  public function getRenderData(){
    $fields = $this->formatFillableToModel($this->fields);
    $attributes = (array)(json_decode($this->attributes["attributes"]) ?? []);

    //Merge fields(content-fields) into attributes
    foreach ($attributes as $name => $value){
      $attributes[$name] = array_merge((array)$attributes[$name], (array)($fields[$name] ?? []));
      //Parse to camel case
      $attrTmp = [];
      foreach ($attributes[$name] as $key => $item) $attrTmp[Str::camel($key)] = $item;
      $attributes[$name] = $attrTmp;
    }

    return [
      "id" => $this->id,
      "component" => $this->component ?? [],
      "entity" => $this->entity ?? [],
      "status" => $this->status,
      "attributes" => $attributes,
      "gridPosition" => $this->grid_position,
      "sortOrder" => $this->sort_order,
    ];
  }
}
