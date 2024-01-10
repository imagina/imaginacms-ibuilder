<?php

namespace Modules\Ibuilder\Events\Handlers;

use Modules\Core\Icrud\Transformers\CrudResource;
use Modules\Ibuilder\Entities\Layout;

class SetDefaultLayout
{

  private $log = "Ibuilder: Handler|UpdateDefaultLayout|";

  public function __construct()
  {
  }

  public function handle($event)
  {

    \Log::info($this->log."INIT");

    try {
      $model = $event->model;

      if($model["data"] && $model["data"]["default"]) {

        Layout::where('type', $model["data"]["type"])
          ->where('entity_type', $model["data"]["entity_type"])
          ->where('id', '!=', $model["data"]["id"])
          ->update(['default' => 0]);

      }
    } catch (\Exception $e) {
      \Log::info($this->log."ERROR");
      \Log::info($e->getMessage().' '.$e->getFile().' '.$e->getLine());
    }
  }
  
  
}
