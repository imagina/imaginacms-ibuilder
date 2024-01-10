<?php

namespace Modules\Ibuilder\Events;

class LayoutWasUpdated
{
  public $model;

  /*
  *  updatedWithBindings Params - From Entity
  */
  public function __construct($model = null)
  {
    $this->model = $model;
  }

}