<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\View\Component;

class Container extends Component
{
  public $view, $id, $children;

  public function __construct($id = null, $children = [])
  {
    $params = get_defined_vars();//Get all params
    $this->instanceGeneralAttributes($params);//Init
  }

  /**
   * Instance the component attributes
   * @return void
   */
  public function instanceGeneralAttributes($params)
  {
    $this->view = "ibuilder::frontend.components.container";
    $this->id = $params["id"] ?? uniqid();
    $this->children = $params["children"];
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    if ($this->blockConfig->status) return view($this->view);
  }
}

