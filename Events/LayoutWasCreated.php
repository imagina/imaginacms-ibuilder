<?php


namespace Modules\Ibuilder\Events;


class LayoutWasCreated
{
    public $model;

  public function __construct($model = null)
  {
    $this->model = $model;
  }

}
