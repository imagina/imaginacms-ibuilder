<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\View\Component;
class ContentCustom extends Component
{
    public $id;
    public $item;
    public $viewParams;
    public $row;
    public $withTitle;
    public $titleClass;
    public $titleStyle;
    public $titleFontSize;
    public $titleLetterSpacing;
    public $titleAlign;
    public $titleColor;
    public $titleColorByClass;
    public $titleIcon;
    public $titleIconPosition;
    public $titleIconStyle;

    public $imageClass;
    public $imageStyle;
    public $imageObjectFit;
    public $imageObjectPosicion;
    public $imageAspectRatio;
    public $imageAspectRatioCustom;
    public $imageZone;

    public $withMedia;
    public $withBody;
    public $withGallery;
    public $withBodyExtra;
    public $withVideoExternal;
    public $withShare;
    public $orderClasses;
    public $orderSidebar;

    public $withLineTitle;
    public $lineTitleConfig;

    public $videoLoop;
    public $videoAutoplay;
    public $videoMuted;
    public $videoControls;

    public $bodyClass;
    public $bodyStyle;
    public $bodyFontSize;
    public $bodyAlign;
    public $bodyColor;
    public $bodyColorByClass;
    public $bodyContentInside;

    public $galleryLayout;
    public $galleryResponsive;
    public $galleryDots;
    public $galleryDotsStyle;
    public $galleryDotsStyleColor;
    public $galleryDotsSize;
    public $galleryNav;
    public $galleryNavIcons;
    public $galleryNavSize;
    public $galleryNavColor;
    public $galleryNavColorHover;
    public $galleryNavPosition;
    public $galleryClass;
    public $galleryStyle;
    public $galleryObjectFit;
    public $galleryObjectPosicion;
    public $galleryAspectRatio;
    public $galleryAspectRatioCustom;

    public $bodyExtra;
    public $bodyExtraClass;
    public $bodyExtraStyle;
    public $bodyExtraFontSize;
    public $bodyExtraAlign;
    public $bodyExtraColor;
    public $bodyExtraColorByClass;
    public $bodyExtraMiniClass;

    public $videoExternal;
    public $videoExternalResponsive;
    public $videoExternalClass;
    public $videoExternalStyle;
    public $videoExternalMiniClass;
    public $videoExternalWidth;
    public $videoExternalHeight;

    public $shareClass;
    public $shareFontClass;
    public $shareStyle;

    public $withCategory;
    public $categoryClass;
    public $categoryStyle;
    public $categoryFontSize;
    public $categoryAlign;
    public $categoryColor;
    public $categoryColorByClass;

    public $withDate;
    public $dateClass;
    public $dateStyle;
    public $dateFontSize;
    public $dateAlign;
    public $dateColor;
    public $dateColorByClass;
    public $formatCreatedDate;

    public $withSummary;
    public $summaryClass;
    public $summaryStyle;
    public $summaryFontSize;
    public $summaryAlign;
    public $summaryColor;
    public $summaryColorByClass;
    public $summaryLetterSpacing;

    public $withUser;
    public $userClass;
    public $userStyle;
    public $userFontSize;
    public $userAlign;
    public $userColor;
    public $userColorByClass;

    public $typeContent;
    public $filterBlog;
    public $filters;
    public $filtersTitle;
    public $filtersStyle;

    public $itemListAttr;
    public $itemListType;
    public $itemListLabelButton;
    public $itemListTitle;
    public $itemListTake;
    public $itemListCol;
    public $itemListFilter;
    public $itemListPag;
    public $itemListPagType;
    public $itemListPagStyle;
    public $itemListPagStyleGeneral;
    public $view;

    public $carouselAttr;
    public $carouselItems;
    public $carouselTitle;

    public $itemListLateralAttr;
    public $itemListLateralType;
    public $itemListLateralLabelButton;
    public $itemListLateralTitle;
    public $itemListLateralTitleClass;
    public $itemListLateralTake;
    public $itemListLateralCol;

    public $withFilterCategory;
    public $withCarousel;
    public $withListLateral;
    public $withListMain;


  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($id = null,
                              $item = [],
                              $viewParams = [],
                              $row = "row",
                              $withTitle = 1,
                              $titleClass = "",
                              $titleStyle = null,
                              $titleFontSize = "24",
                              $titleLetterSpacing = 0,
                              $titleAlign = "",
                              $titleColor = null,
                              $titleColorByClass = "text-primary",
                              $titleIcon = "",
                              $titleIconPosition = 1,
                              $titleIconStyle = null,
                              $imageClass = "",
                              $imageStyle = null,
                              $imageObjectFit = "cover",
                              $imageObjectPosicion = "",
                              $imageAspectRatio = "21/5",
                              $imageAspectRatioCustom = "",
                              $imageZone="mainimage",
                              $withMedia = 1,
                              $withBody = 1,
                              $withGallery = 1,
                              $withBodyExtra = 3,
                              $withVideoExternal = 3,
                              $withShare = true,
                              $orderClasses = [],
                              $orderSidebar = [],
                              $videoLoop = false,
                              $videoAutoplay = false,
                              $videoMuted = false,
                              $videoControls = false,
                              $withLineTitle = false,
                              $lineTitleConfig = [],
                              $bodyClass = "",
                              $bodyStyle = null,
                              $bodyFontSize = "18",
                              $bodyAlign = "text-justify",
                              $bodyColor = null,
                              $bodyColorByClass = "text-dark",
                              $bodyContentInside = "float-left w-50",
                              $bodyExtraMiniClass = "",
                              $galleryLayout = "gallery-layout-1",
                              $galleryResponsive = [],
                              $galleryDots = false,
                              $galleryDotsStyle = "dots-circular",
                              $galleryDotsStyleColor = "",
                              $galleryDotsSize = "",
                              $galleryNav = false,
                              $galleryNavIcons = "",
                              $galleryNavSize = "14",
                              $galleryNavColor = "var(--dark)",
                              $galleryNavColorHover = "var(--primary)",
                              $galleryNavPosition = "1",
                              $galleryClass = "",
                              $galleryStyle = null,
                              $galleryObjectFit = "cover",
                              $galleryObjectPosicion = "",
                              $galleryAspectRatio = "1/1",
                              $galleryAspectRatioCustom = "",
                              $bodyExtra = "",
                              $bodyExtraClass = "",
                              $bodyExtraStyle = null,
                              $bodyExtraFontSize = "18",
                              $bodyExtraAlign = "text-justify",
                              $bodyExtraColor = null,
                              $bodyExtraColorByClass = "text-dark",
                              $shareClass = "",
                              $shareFontClass = "mr-2 mb-2",
                              $shareStyle = null,
                              $videoExternal = null,
                              $videoExternalResponsive = "embed-responsive-4by3",
                              $videoExternalClass = "",
                              $videoExternalStyle = null,
                              $videoExternalMiniClass = "",
                              $videoExternalWidth = "100%",
                              $videoExternalHeight = "300px",
                              $withCategory = 1,
                              $categoryClass = "",
                              $categoryStyle = null,
                              $categoryFontSize = "18",
                              $categoryAlign = "text-justify",
                              $categoryColor = null,
                              $categoryColorByClass = "text-dark",
                              $withDate = 1,
                              $dateClass = "",
                              $dateStyle = null,
                              $dateFontSize = "18",
                              $dateAlign = "text-justify",
                              $dateColor = null,
                              $dateColorByClass = "text-dark",
                              $formatCreatedDate = "d \\d\\e M",
                              $withSummary = 1,
                              $summaryClass = "",
                              $summaryStyle = null,
                              $summaryFontSize = "18",
                              $summaryAlign = "text-justify",
                              $summaryColor = null,
                              $summaryColorByClass = "text-dark",
                              $summaryLetterSpacing = 0,
                              $withUser = 1,
                              $userClass = "",
                              $userStyle = null,
                              $userFontSize = "18",
                              $userAlign = "text-justify",
                              $userColor = null,
                              $userColorByClass = "text-dark",
                              $filters = null,
                              $filtersTitle = 'iblog::category.plural',
                              $filtersStyle = null,
                              $itemListAttr = [],
                              $itemListType = 'Post',
                              $itemListTitle = null,
                              $itemListLabelButton = '',
                              $itemListTake = 8,
                              $itemListCol = "col-12 col-md-6 col-lg-4 mb-3",
                              $itemListFilter = "category",
                              $itemListPag = true,
                              $itemListPagType = "normal",
                              $itemListPagStyle = [],
                              $itemListPagStyleGeneral = 0,
                              $carouselAttr = [],
                              $carouselItems = [],
                              $carouselTitle = "",
                              $itemListLateralAttr = [],
                              $itemListLateralType = "Post",
                              $itemListLateralTitle = "",
                              $itemListLateralTitleClass = "mt-1 mb-3",
                              $itemListLateralLabelButton = "",
                              $itemListLateralTake = 3,
                              $itemListLateralCol = "col-12 mb-4",
                              $withFilterCategory = null,
                              $withCarousel = null,
                              $withListLateral = null,
                              $withListMain = true
  )
  {
      $this->id= $id ?? uniqid('customItem');
      $this->row = $row;
      $this->withTitle = $withTitle;
      $this->titleClass = $titleClass;
      $this->titleStyle = $titleStyle;
      $this->titleFontSize = $titleFontSize;
      $this->titleLetterSpacing = $titleLetterSpacing;
      $this->titleAlign = $titleAlign;
      $this->titleColor = $titleColor;
      $this->titleColorByClass = $titleColorByClass;
      $this->titleIcon = $titleIcon;
      $this->titleIconPosition = $titleIconPosition;
      $this->titleIconStyle = $titleIconStyle;
      $this->imageClass = $imageClass;
      $this->imageStyle = $imageStyle;
      $this->imageObjectFit = $imageObjectFit;
      $this->imageObjectPosicion = $imageObjectPosicion;
      $this->imageAspectRatio = $imageAspectRatio;
      $this->imageAspectRatioCustom = $imageAspectRatioCustom;
      $this->imageZone = $imageZone;
      $this->withMedia = $withMedia;
      $this->withBody = $withBody;
      $this->withGallery = $withGallery;
      $this->withBodyExtra = $withBodyExtra;
      $this->withVideoExternal = $withVideoExternal;
      $this->withShare = $withShare;
      $this->orderClasses = !empty($orderClasses) ? $orderClasses : ["list" => "col-12 order-0", "title" => "col-12 order-0", "media" => "col-12 order-1",
                                                                    "body" => "col-12 order-2", "gallery" => "col-12 order-3", "bodyExtra" => "col-12 order-4",
                                                                    "videoExternal" => "col-12 order-5", "share" => "col-12 order-6",  "summary" => "col-12 order-7",
                                                                    "category" => "col-12 order-8", "date" => "col-12 order-9", "user" => "col-12 order-10"];
      $this->orderSidebar = !empty($orderSidebar) ? $orderSidebar : ["sidebar" => "col-md-4 pr-lg-5 pb-5", "content" => "col-md-8 pb-5", "content-row" => "row", "extra" => "col-12 pb-5"];
      $this->withLineTitle = $withLineTitle;
      $this->lineTitleConfig = !empty($lineTitleConfig) ? $lineTitleConfig : [
          "background" => "var(--primary)",
          "height" => "2px",
          "width" => "10%",
          "margin" => "0 auto"];
      $this->videoLoop = $videoLoop;
      $this->videoAutoplay = $videoAutoplay;
      $this->videoMuted = $videoMuted;
      $this->videoControls = $videoControls;
      $this->bodyExtraClass = $bodyExtraClass;
      $this->bodyExtraStyle = $bodyExtraStyle;
      $this->bodyExtraFontSize = $bodyExtraFontSize;
      $this->bodyExtraAlign = $bodyExtraAlign;
      $this->bodyExtraColor = $bodyExtraColor;
      $this->bodyExtraColorByClass = $bodyExtraColorByClass;
      $this->bodyExtraMiniClass = $bodyExtraMiniClass;
      $this->galleryLayout = $galleryLayout;
      $this->galleryClass = $galleryClass;
      $this->galleryStyle = $galleryStyle;
      $this->galleryObjectFit = $galleryObjectFit;
      $this->galleryObjectPosicion = $galleryObjectPosicion;
      $this->galleryAspectRatio = $galleryAspectRatio;
      $this->galleryAspectRatioCustom = $galleryAspectRatioCustom;
      $this->galleryResponsive = $galleryResponsive ?? [0 => ["items" => 1], 640 => ["items" => 2], 992 => ["items" => 4]];
      $this->galleryDots = $galleryDots;
      $this->galleryDotsStyle = $galleryDotsStyle;
      $this->galleryDotsStyleColor = $galleryDotsStyleColor;
      $this->galleryDotsSize = $galleryDotsSize;
      $this->galleryNav = $galleryNav;
      $this->galleryNavSize = $galleryNavSize;
      $this->galleryNavColor = $galleryNavColor;
      $this->galleryNavColorHover = $galleryNavColorHover;
      $this->galleryNavPosition = $galleryNavPosition;
      $this->bodyClass = $bodyClass;
      $this->bodyStyle = $bodyStyle;
      $this->bodyFontSize = $bodyFontSize;
      $this->bodyAlign = $bodyAlign;
      $this->bodyColor = $bodyColor;
      $this->bodyColorByClass = $bodyColorByClass;
      $this->bodyContentInside = $bodyContentInside;
      $this->shareClass = $shareClass;
      $this->shareFontClass = $shareFontClass;
      $this->shareStyle = $shareStyle;
      $this->videoExternalMiniClass = $videoExternalMiniClass;
      $this->videoExternalResponsive = $videoExternalResponsive;
      $this->videoExternalClass = $videoExternalClass;
      $this->videoExternalStyle = $videoExternalStyle;
      $this->videoExternalWidth = $videoExternalWidth;
      $this->videoExternalHeight = $videoExternalHeight;
      $this->withCategory = $withCategory;
      $this->categoryClass = $categoryClass;
      $this->categoryStyle = $categoryStyle;
      $this->categoryFontSize = $categoryFontSize;
      $this->categoryAlign = $categoryAlign;
      $this->categoryColor = $categoryColor;
      $this->categoryColorByClass = $categoryColorByClass;
      $this->withDate = $withDate;
      $this->dateClass = $dateClass;
      $this->dateStyle = $dateStyle;
      $this->dateFontSize = $dateFontSize;
      $this->dateAlign = $dateAlign;
      $this->dateColor = $dateColor;
      $this->dateColorByClass = $dateColorByClass;
      $this->formatCreatedDate = $formatCreatedDate;
      $this->withSummary = $withSummary;
      $this->summaryClass = $summaryClass;
      $this->summaryStyle = $summaryStyle;
      $this->summaryFontSize = $summaryFontSize;
      $this->summaryAlign = $summaryAlign;
      $this->summaryColor = $summaryColor;
      $this->summaryColorByClass = $summaryColorByClass;
      $this->summaryLetterSpacing = $summaryLetterSpacing;
      $this->withUser = $withUser;
      $this->userClass = $userClass;
      $this->userStyle = $userStyle;
      $this->userFontSize = $userFontSize;
      $this->userAlign = $userAlign;
      $this->userColor = $userColor;
      $this->userColorByClass = $userColorByClass;
      $this->filters = $this->getFilters($filters,$filtersTitle);
      $this->filtersStyle = $filtersStyle;
      $this->itemListAttr = $this->getItemAttributes($itemListAttr,$itemListLabelButton);
      $this->itemListType = $itemListType;
      $this->itemListTitle = $itemListTitle;
      $this->itemListTake = $itemListTake;
      $this->itemListCol = $itemListCol;
      $this->itemListFilter = $itemListFilter;
      $this->itemListPag = $itemListPag;
      $this->itemListPagType = $itemListPagType;
      $this->itemListPagStyle = !empty($itemListPagStyle) ? $itemListPagStyle : [
          "color" => "var(--dark)",
          "size" => "12",
          "width" => "30",
          "height" => "30",
          "radius" => "50%",
          "backgroundActivo" => "var(--primary)",
          "backgroundInactivo" => "transparent",
          "colorHover" => "var(--light)",
          "colorActivo" => "#ffffff",
          "backgroundHover" => "var(--light)",
          "margin" => "0 1px",
      ];
      $this->itemListPagStyleGeneral = $itemListPagStyleGeneral;
      $this->carouselAttr = !empty($carouselAttr) ? $carouselAttr : [
        "take" => "20",
        "margin" => "20",
        "titleClasses" => "",
        "loops" => false,
        "dots" => false,
        "dotsStyle" => "",
        "dotsStyleColor" => "",
        "dotsSize" => "",
        "mediaImage" => "mainimage",
        "autoplay" => false,
        "responsive" => [300 => ['items' =>  1],700 => ['items' =>  2], 1024 => ['items' => 3]],
        "center" => false,
        "stagePadding" => "0",
      ];

      $this->carouselItems = !empty($carouselItems) ? $carouselItems : config('asgard.iblog.config.itemComponentAttributesBlog');
      $this->carouselTitle = !empty($carouselTitle) ? $carouselTitle : "iblog::common.layouts.posts.layout6.titleCarousel";

      $this->itemListLateralAttr = $this->getItemAttributes($itemListLateralAttr,$itemListLateralLabelButton);
      $this->itemListLateralType = $itemListLateralType;
      $this->itemListLateralTitle = !empty($itemListLateralTitle) ? $itemListLateralTitle : "iblog::common.layouts.titlePostRecent";
      $this->itemListLateralTitleClass = $itemListLateralTitleClass;
      $this->itemListLateralTake = $itemListLateralTake;
      $this->itemListLateralCol = $itemListLateralCol;
      $this->withListMain = $withListMain;
      $this->getItem($item,$viewParams,$withFilterCategory,$withCarousel,$withListLateral);

      if(!empty($bodyExtra)){
          if (strpos($bodyExtra, ',') !== false) {
              $this->bodyExtra = explode(",",$bodyExtra);
          } else {
              $this->bodyExtra = array($bodyExtra);
          }
      }
      if(!empty($videoExternal)){
          if (strpos($videoExternal, ',') !== false) {
              $this->videoExternal = explode(",",$videoExternal);
          } else {
              $this->videoExternal = array($videoExternal);
          }
      }

      if(!empty($galleryNavIcons)){
          if (strpos($galleryNavIcons, ',') !== false) {
              $this->galleryNavIcons = explode(",",$galleryNavIcons);
          } else {
              $this->galleryNavIcons = $this->galleryLayout=="gallery-layout-7" ? array("fa fa-angle-up","fa fa-angle-down") : array("fa fa-arrow-left","fa fa-arrow-right");
          }
      } else {
          $this->galleryNavIcons = $this->galleryLayout=="gallery-layout-7" ? array("fa fa-angle-up","fa fa-angle-down") : array("fa fa-arrow-left","fa fa-arrow-right");

      }

  }


  /**
  * Get the inherit content for page blog (post,category)
  *
  * @return item
  */
  public function getItem($item,$params,$withFilterCategory,$withCarousel,$withListLateral)
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
              $this->view = "ibuilder::frontend.components.content-custom.page.index";
              $this->withFilterCategory = $withFilterCategory ?? false;
              $this->withCarousel = $withCarousel ?? false;
              $this->withListLateral = $withListLateral ?? false;
              break;
          case 'Modules\Iblog\Entities\Post':
              $this->typeContent = 'post';
              $this->view = "ibuilder::frontend.components.content-custom.blog.index";
              $this->withFilterCategory = $withFilterCategory ?? true;
              $this->withCarousel = $withCarousel ?? true;
              $this->withListLateral = $withListLateral ?? true;
              $this->filterBlog = ['category' => $this->item->category->id,'exclude'=>$this->item->id];
              break;
          case 'Modules\Iblog\Entities\Category':
              $this->typeContent = 'category';
              $this->view = "ibuilder::frontend.components.content-custom.blog.index";
              $this->withFilterCategory = $withFilterCategory ?? true;
              $this->withCarousel = $withCarousel ?? true;
              $this->withListLateral = $withListLateral ?? true;
              $this->filterBlog = ['category' => $this->item->id ?? null];
              break;
      }
  }

  public function getFilters($filter,$title)
  {
      if(is_null($filter)) {
        $filter = [ 'title' => $title,
                    'name' => 'categories',
                    'typeTitle' => 'titleOfTheConfig',
                    'status' => true,
                    'isExpanded' => true,
                    'type' => 'tree',
                    'repository' => 'Modules\Iblog\Repositories\CategoryRepository',
                    'entityClass' => 'Modules\Iblog\Entities\Category',
                    'params' => ['filter' => ['internal' => false]],
                    'emitTo' => false,
                    'repoAction' => null,
                    'repoAttribute' => null,
                    'listener' => null,
                    'layout' => 'default',
                    'classes' => 'col-12'];

      } else {
          $filter['title'] = $title;
      }

      return $filter;
  }

  public function getItemAttributes($attributes,$labelButton)
  {
    if(!empty($labelButton))  {
       $attributes['viewMoreButtonLabel'] = $labelButton;
    }
    return $attributes;
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
