<?php

namespace Modules\Ibuilder\Transformers;

use Modules\Core\Icrud\Transformers\CrudResource;

class BlockTransformer extends CrudResource
{
  /**
   * Method to merge values with response
   *
   * @return array
   */
  public function modelAttributes($request)
  {
    return [
      'sortOrder' => $this->whenPivotLoaded('ibuilder__layout_blocks', function () {
        return $this->pivot->sort_order;
      }),
      'parentSystemName' => $this->whenPivotLoaded('ibuilder__layout_blocks', function () {
        return $this->pivot->parent_system_name;
      }),
      'gridPosition' => $this->whenPivotLoaded('ibuilder__layout_blocks', function () {
        return $this->pivot->grid_position;
      })
    ];
  }
}
