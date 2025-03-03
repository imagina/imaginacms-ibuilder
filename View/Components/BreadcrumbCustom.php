<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\View\Component;

class BreadcrumbCustom extends Component
{
  public $item;
  public $viewParams;
  public $sectionClass;
  public $sectionStyle;
  public $breadcrumbClass;
  public $breadcrumbOnlyMainCategory;
  public $breadcrumbStyle;
  public $breadcrumbFontSize;
  public $breadcrumbColor;
  public $container;
  public $containerClass;
  public $row;
  public $col;
  public $withTitle;
  public $titleClass;
  public $titleStyle;
  public $titlePosition;
  public $fontSizeTitle;
  public $colorTitle;
  public $colorTitleByClass;
  public $extraContent;
  public $withExtraContent;
  public $extraContentColor;
  public $extraContentColorClass;
  public $extraContentPosition;
  public $extraContentClass;
  public $extraContentSize;
  public $extraContentStyle;
  public $withImage;
  public $imageClass;
  public $imageStyle;
  public $imageObjectFit;
  public $imageObjectPosicion;
  public $imageAspectRatio;
  public $imageAspectRatioMobile;
  public $overlay;
  public $icon;
  public $iconFont;
  public $breadcrumbPosition;
  public $typeContent;
  public $titleType; // 1 nombre actual , 2 categoria (Solo en post)
  public $title;

  public $videoLoop;
  public $videoAutoplay;
  public $videoMuted;
  public $videoControls;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($item = [],
                              $viewParams = [],
                              $sectionClass = "",
                              $sectionStyle = "",
                              $breadcrumbOnlyMainCategory = 1,
                              $breadcrumbClass = "bg-transparent px-0 mb-0",
                              $breadcrumbStyle = "",
                              $breadcrumbFontSize = 16,
                              $breadcrumbColor = null,
                              $container = "container",
                              $containerClass = "",
                              $row = "row align-items-center",
                              $col = "col-auto",
                              $withTitle = false,
                              $titleClass = "",
                              $titleStyle = "",
                              $titlePosition = 1,
                              $fontSizeTitle = "24",
                              $colorTitle = null,
                              $colorTitleByClass = "text-white",
                              $extraContent = "",
                              $withExtraContent = true,
                              $extraContentColor = null,
                              $extraContentColorClass = "text-white",
                              $extraContentPosition = "text-center",
                              $extraContentClass = "text-center",
                              $extraContentSize = '18',
                              $extraContentStyle = null,
                              $withImage = false,
                              $imageClass = "",
                              $imageStyle = "",
                              $overlay = "",
                              $icon = "",
                              $iconFont = "",
                              $breadcrumbPosition = 0,
                              $imageObjectFit = "cover",
                              $imageObjectPosicion = "",
                              $imageAspectRatio = "21/5",
                              $imageAspectRatioMobile = "16/9",
                              $titleType = 1,
                              $title = "",
                              $videoLoop = false,
                              $videoAutoplay = false,
                              $videoMuted = false,
                              $videoControls = false
  )
  {
    $this->sectionClass = $sectionClass;
    $this->sectionStyle = $sectionStyle;
    $this->breadcrumbOnlyMainCategory = $breadcrumbOnlyMainCategory;
    $this->breadcrumbClass = $breadcrumbClass;
    $this->breadcrumbStyle = $breadcrumbStyle;
    $this->breadcrumbFontSize = $breadcrumbFontSize;
    $this->breadcrumbColor = $breadcrumbColor;
    $this->container = $container;
    $this->containerClass = $containerClass;
    $this->row = $row;
    $this->col = $col;
    $this->withTitle = $withTitle;
    $this->titleClass = $titleClass;
    $this->titleStyle = $titleStyle;
    $this->titlePosition = $titlePosition;
    $this->fontSizeTitle = $fontSizeTitle;
    $this->colorTitle = $colorTitle;
    $this->colorTitleByClass = $colorTitleByClass;
    $this->extraContent = $extraContent;
    $this->withExtraContent = $withExtraContent;
    $this->extraContentColor = $extraContentColor;
    $this->extraContentColorClass = $extraContentColorClass;
    $this->extraContentPosition = $extraContentPosition;
    $this->extraContentClass = $extraContentClass;
    $this->extraContentSize = $extraContentSize;
    $this->extraContentStyle = $extraContentStyle;
    $this->withImage = $withImage;
    $this->imageClass = $imageClass;
    $this->imageStyle = $imageStyle;
    $this->overlay = $overlay;
    $this->icon = $icon;
    $this->iconFont = $iconFont;
    $this->breadcrumbPosition = $breadcrumbPosition;
    $this->imageObjectFit = $imageObjectFit;
    $this->imageObjectPosicion = $imageObjectPosicion;
    $this->imageAspectRatio = $imageAspectRatio;
    $this->imageAspectRatioMobile = $imageAspectRatioMobile;
    $this->titleType = $titleType;
    $this->getItem($item, $viewParams);
    $this->videoLoop = $videoLoop;
    $this->videoAutoplay = $videoAutoplay;
    $this->videoMuted = $videoMuted;
    $this->videoControls = $videoControls;
    $this->title = $this->getTitle($this->typeContent, $this->titleType);

    //  Covert to array extra fields
    if (!empty($extraContent)) {
      if (strpos($extraContent, ',') !== false) {
        $this->extraContent = explode(",", $extraContent);
      } else {
        $this->extraContent = array($extraContent);
      }
    }
  }

  /**
   * Get the inherit content for page blog (post,category)
   *
   * @return title
   */
  public function getTitle($typeContent, $titleType)
  {
    $title = "";
    if ($typeContent == 'post' && $titleType == 2) {
      $title = $this->item->category->title;
    }
    elseif($typeContent=='post' && $titleType==3) {
       $parent=get_categories(['include' => [$this->item->category->parent_id ?? null],'take'=>1]);
       $title = $parent[0]->title;
    }
    elseif($typeContent=='category' && $titleType==3) {
      $parent = get_categories(['include' => [$this->item->parent_id ?? null], 'take' => 1]);
      $title = $parent[0]->title ?? $this->item->category->title  ?? $this->item->title;
    }
    else {
      $title = $this->item->title;
    }
    return $title;
  }

  /**
  * Get the inherit content for page blog (post,category)
  *
  * @return item
  */
  public function getItem($item,$params)
  {
      if(!empty($params)) {
          if(isset($params['post'])) {
              $this->item = $params['post'];
          }
          if(isset($params['posts'])) {
              $this->item = $params['category'];
          }
          if(isset($params['page'])) {
              $this->item = $params['page'];
          }
      }
      else {
          $this->item = $item;
      }

      switch ($this->item->entity) {
          case 'Modules\Page\Entities\Page':
              $this->typeContent = 'page';
              break;
          case 'Modules\Iblog\Entities\Post':
              $this->typeContent = 'post';
              break;
          case 'Modules\Iblog\Entities\Category':
              $this->typeContent = 'category';
              break;
      }

  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view("ibuilder::frontend.components.breadcrumb-custom.index");
  }
}
