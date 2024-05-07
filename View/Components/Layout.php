<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
  public $view, $layout, $id, $alternativeView, $entityType, $type;

  public function __construct(
    $id = null,
    $alternativeView = null,
    $entityType,
    $type
  )
  {
    $params = get_defined_vars();//Get all params
    $this->instanceGeneralAttributes($params);//Init
    $this->getLayout();
  }

  /**
   * Instance the component attributes
   * @return void
   */
  public function instanceGeneralAttributes($params)
  {
    $this->view = "ibuilder::frontend.partials.blockGrid";
    $this->id = $params["id"] ?? uniqid('builder-layout-');
    $this->alternativeView = $params["alternativeView"] ?? null;
    $this->entityType = $params["entityType"];
    $this->type = $params["type"];
  }

  /**
   * Search the default layout by filters
   * @return void
   */
  public function getLayout()
  {
    $layoutRepository = app("Modules\Ibuilder\Repositories\LayoutRepository");
    $this->layout = $layoutRepository->getItem($this->entityType, json_decode(json_encode([
      "filter" => [
        "field" => "entity_type",
        "type" => $this->type,
        "default" => 1
      ]
    ])));
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    if ($this->layout) {
      $layout = $this->layout;
      $blocks = $layout->getBlocksToRender();
      //Render view
      return view($this->view, compact('layout', 'blocks'));
    } else if ($this->alternativeView) {
      return view($this->alternativeView);
    }
  }
}