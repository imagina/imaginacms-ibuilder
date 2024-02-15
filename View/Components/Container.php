<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\View\Component;

class Container extends Component
{
  public $view, $id, $children, $containerBlock, $row, $backgrounds, $backgroundImg,
         $backgroundGeneral, $styleContainer;

  public function __construct($id = null,
                              $children = [],
                              $containerBlock = 'overflow-hidden',
                              $row = '',
                              $backgrounds = [],
                              $backgroundImg = '',
                              $backgroundGeneral = '',
                              $styleContainer = null)
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
    $this->id = $params["id"] ?? uniqid('container-');
    $this->children = $params["children"];
    $this->containerBlock = $params["containerBlock"];
    $this->row = $params["row"];
    $this->backgrounds = $params["backgrounds"];
    $this->backgroundGeneral = $params["backgroundGeneral"];
    $this->styleContainer = $params["styleContainer"];
    $this->backgroundImg = $this->backgroundImage($params["backgroundImg"]);
  }

  /**
    *
    * @return image
  */
  public function backgroundImage($paramsImage)
  {
    $image = "";
    if(!empty($paramsImage)){
        if (!empty($paramsImage->mimeType) && $paramsImage->mimeType=="image/svg+xml") {
            $image = $paramsImage->path;
        } elseif(!empty($paramsImage->extraLargeThumb)) {
            $image = $paramsImage->extraLargeThumb;
        }
    }
    return $image;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view($this->view);
  }
}

