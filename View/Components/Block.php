<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Collective\Html\Componentable;
use Illuminate\Support\Facades\Blade;
use Modules\Ibuilder\Entities\Block as BlockEntity;
use Modules\Ibuilder\Repositories\BlockRepository;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;

class Block extends Component
{
  use MediaRelation;

  public $container, $id, $columns, $borderForm, $display,
    $width, $height, $backgrounds, $paddingX, $paddingY, $editLink, $tooltipEditLink,
    $marginX, $marginY, $overlay, $backgroundColor, $componentIsite, $componentType, $isBlade, $view,
    $systemName, $blockConfig, $componentConfig, $blockClasses, $blockStyle, $row, $inheritContent,
    $position, $top, $left, $right, $bottom, $zIndex, $blockStyleResponsive;
  public $animateBlockName, $animateBlockDelay, $animateBlockDuration, $animateBlockOffset,
    $animateBlockEasing, $animateBlockOnce, $animateBlockMirror;
  public $withButton, $buttonPosition, $buttonAlign, $buttonLayout, $buttonIcon, $buttonIconLR, $buttonIconColor,
    $buttonIconColorHover, $buttonColor, $buttonMarginT, $buttonMarginB, $buttonSize, $buttonTextSize,
    $buttonClasses, $buttonShadow, $buttonLabel, $buttonUrl, $buttonTarget, $buttonConfig, $blockRepository;

  public function __construct(
    $container = null,
    $id = null,
    $columns = null,
    $borderForm = null,
    $display = null,
    $width = "auto",
    $height = "auto",
    $backgrounds = [],
    $paddingX = "",
    $paddingY = "",
    $marginX = "auto",
    $marginY = "auto",
    $overlay = null,
    $backgroundColor = "",
    $componentIsite = "",
    $systemName = null,
    $blockConfig = [],
    $blockClasses = "",
    $blockStyle = "",
    $row = "",
    $inheritContent = null,
    $position = "relative",
    $top = "unset",
    $left = "unset",
    $right = "unset",
    $bottom = "unset",
    $zIndex = 0,
    $animateBlockName = "",
    $animateBlockDelay = "",
    $animateBlockDuration = "",
    $animateBlockOffset = "",
    $animateBlockEasing = "",
    $animateBlockOnce = false,
    $animateBlockMirror = false,
    $blockStyleResponsive = [],
    $withButton = false,
    $buttonPosition = "1",
    $buttonAlign = "text-left",
    $buttonLayout = "border-0",
    $buttonIcon = " ",
    $buttonIconColor = null,
    $buttonIconColorHover = null,
    $buttonIconLR = "left",
    $buttonColor = "primary",
    $buttonMarginT = "mt-0",
    $buttonMarginB = "mb-0",
    $buttonSize = "button-normal",
    $buttonTextSize = 16,
    $buttonClasses = "",
    $buttonShadow = "",
    $buttonLabel = "",
    $buttonUrl = "",
    $buttonTarget = "",
    $buttonConfig = []
  )
  {
    $this->blockRepository = app('Modules\Ibuilder\Repositories\BlockRepository');
    //Get all params
    $params = get_defined_vars();
    //Init
    $this->instanceGeneralAttributes($params);
    $this->instanceBackgroundAttribute($params);
    $this->instanceBlockConfig($params);
    $this->instanceBlockConfigFiles($params);
    $this->instanceComponentType($params);
    $this->instanceComponentConfig();

  }

  /**
   * Instance the component attributes
   * @return void
   */
  public function instanceGeneralAttributes($params)
  {
    $this->id = $params["id"] ?? uniqid();
    $this->container = $params["container"];
    $this->columns = $params["columns"];
    $this->backgrounds = $params["backgrounds"];
    $this->borderForm = $params["borderForm"];
    $this->display = $params["display"];
    $this->width = $params["width"];
    $this->height = $params["height"];
    $this->paddingX = $params["paddingX"];
    $this->paddingY = $params["paddingY"];
    $this->marginX = $params["marginX"];
    $this->marginY = $params["marginY"];
    $this->overlay = $params["overlay"];
    $this->backgroundColor = $params["backgroundColor"];
    $this->componentIsite = $params["componentIsite"];
    $this->componentType = null;
    $this->isBlade = false;
    $this->view = "ibuilder::frontend.components.blocks";
    $this->blockConfig = $params["blockConfig"];
    $this->systemName = $params["systemName"];
    $this->blockClasses = $params["blockClasses"];
    $this->blockStyle = $params["blockStyle"];
    $this->row = $params["row"];
    $this->inheritContent = $params["inheritContent"];
    $this->position = $params["position"];
    $this->top = $params["top"];
    $this->left = $params["left"];
    $this->right = $params["right"];
    $this->bottom = $params["bottom"];
    $this->zIndex = $params["zIndex"];
    $this->animateBlockName = $params["animateBlockName"];
    $this->animateBlockDelay = $params["animateBlockDelay"];
    $this->animateBlockDuration = $params["animateBlockDuration"];
    $this->animateBlockOffset = $params["animateBlockOffset"];
    $this->animateBlockEasing = $params["animateBlockEasing"];
    $this->animateBlockOnce = $params["animateBlockOnce"];
    $this->animateBlockMirror = $params["animateBlockMirror"];
    $this->blockStyleResponsive = $params["blockStyleResponsive"];
    $this->withButton = $params["withButton"];
    $this->buttonPosition = $params["buttonPosition"];
    $this->buttonAlign = $params["buttonAlign"];
    $this->buttonLayout = $params["buttonLayout"];
    $this->buttonIcon = $params["buttonIcon"];
    $this->buttonIconColor = $params["buttonIconColor"];
    $this->buttonIconColorHover = $params["buttonIconColorHover"];
    $this->buttonIconLR = $params["buttonIconLR"];
    $this->buttonColor = $params["buttonColor"];
    $this->buttonMarginT = $params["buttonMarginT"];
    $this->buttonMarginB = $params["buttonMarginB"];
    $this->buttonSize = $params["buttonSize"];
    $this->buttonTextSize = $params["buttonTextSize"];
    $this->buttonClasses = $params["buttonClasses"];
    $this->buttonShadow = $params["buttonShadow"];
    $this->buttonLabel = $params["buttonLabel"];
    $this->buttonUrl = $params["buttonUrl"];
    $this->buttonTarget = $params["buttonTarget"];
    $this->buttonConfig = $params["buttonConfig"];
  }

  /**
   * Instance the Background attribute
   * @return void
   */
  public function instanceBackgroundAttribute($params)
  {
    $this->backgrounds = json_encode($params["backgrounds"] ?? [
      "position" => "center",
      "size" => "cover",
      "repeat" => "no-repeat",
      "color" => "",
      "attachment" => ""
    ]);
  }

  /**
   * Instance the block config
   * @param $params
   * @return void
   */
  public function instanceBlockConfig($params)
  {
    //If not get blockConfig then search by systemName
    if (!is_array($this->blockConfig) || !count($this->blockConfig)) {
      if ($this->systemName) {
        $block = $this->blockRepository->getItem($this->systemName, json_decode(json_encode([
          'filter' => ['field' => 'system_name']
        ])));
        if ($block) $this->blockConfig = $block->getRenderData();
      }
    }
    //Parse
    $blockConfig = json_decode(json_encode(array_merge(["status" => true], $this->blockConfig)));

    //Validate default blockConfig
    $this->validateBlockConfig($blockConfig->attributes);
    $this->validateBlockConfig($blockConfig->attributes->componentAttributes);
    $this->validateBlockConfig($blockConfig->attributes->mainblock);

    //Set blockConfig
    $this->blockConfig = $blockConfig;
  }

  // Validate and set default attributes
  public function validateBlockConfig(&$property, $defaultValue = null)
  {
    if (!isset($property) || is_array($property)) $property = $defaultValue ?? (object)[];
  }

  /**
   * Instance the Media files related to the block
   *
   * @param $params
   * @return void
   */
  public function instanceBlockConfigFiles($params)
  {
    if (!isset($this->blockConfig->mediaFiles)) {
      //Instance the media attributes
      $mediasSingle = (array)($this->blockConfig->mediasSingle ?? []);
      $mediasMulti = (array)($this->blockConfig->mediasMulti ?? []);
      //Instance the blockConfigfiles zones by default
      $mediaFiles = array_merge(
        array_map(function ($zone) {
          return null;
        }, $mediasSingle),
        array_map(function ($zone) {
          return null;
        }, $mediasMulti)
      );
      //Instance the files ID
      $filesId = array_values($mediasSingle);
      //Merge the multi files ID
      foreach ($mediasMulti as $zone) {
        $filesId = array_merge($filesId, ((array)($zone))["files"] ?? []);
      }
      //Request the fiels
      $filesData = File::whereIn('id', $filesId)->get();
      //Set files of media single
      foreach (array_keys($mediasSingle) as $singleZone) {
        $singleFile = $filesData->where('id', $mediasSingle[$singleZone])->first();
        $mediaFiles[$singleZone] = !$singleFile ? null : $this->transformFile($singleFile);
      }
      //Set files of media multi
      foreach (array_keys($mediasMulti) as $multiZone) {
        $multiFiles = $filesData->whereIn('id', ($mediasMulti[$multiZone]->files ?? []));
        $mediaFiles[$multiZone] = !$multiFiles->count() ? [] : $multiFiles->map(function ($file, $keyFile) {
          return $this->transformFile($file);
        })->toArray();
      }
      //Set blockConfig media File
      $this->blockConfig->mediaFiles = json_decode(json_encode($mediaFiles));
    }
  }

  /**
   * Validate and instance if the dynamic component is Liveware or Blade
   * @return void
   */
  public function instanceComponentType($params)
  {
    $systemName = $this->blockConfig->component->systemName ?? null;
    $nameSpace = $this->blockConfig->component->nameSpace ?? null;

    //Validate the parameters
    if ($systemName) {
      //Validate if the component is Blade
      if ($nameSpace && class_exists($nameSpace)) $this->componentType = "blade";
      //Validate if the component is liveware
      if (!$this->componentType) {
        try {
          $finder = app('Livewire\LivewireManager');
          $lwClass = $finder->getClass($systemName);
          $this->blockConfig->component->nameSpace = $lwClass;
          $this->componentType = "livewire";
        } catch (\Exception $e) {
        }
      }
    }
    //Error view
    if (!$this->componentType) $this->view = "ibuilder::frontend.components.blocks-error";
  }

  /**
   * Instance the component config
   * @return void
   */
  public function instanceComponentConfig()
  {
    if ($this->componentType) {
      //Instance the default config
      $this->componentConfig = [
        "systemName" => $this->blockConfig->component->systemName ?? null,
        "nameSpace" => $this->blockConfig->component->nameSpace ?? null,
        "attributes" => []
      ];
      //Instance the default Attributes by component
      $attributes = $this->blockConfig->attributes ?? [];
      //Set component attirbutes
      $this->componentConfig["attributes"] = json_decode(json_encode($attributes->componentAttributes ?? []), true);
      //Set child Attributes
      foreach ($attributes as $name => $attr) {
        if (!in_array($name, ["componentAttributes", "blockAttributes"])) {
          $this->componentConfig["attributes"][$name] = json_decode(json_encode($attr), true);
        }
      }
      //Set the entity attributes by component
      $entity = $this->blockConfig->entity ?? null;
      if ($entity) {
        switch ($this->blockConfig->component->systemName) {
          case 'isite::carousel.owl-carousel':
            $this->componentConfig["attributes"]["repository"] = $entity->type;
            $this->componentConfig["attributes"]["params"] = json_decode(json_encode($entity->params), true);
            //Replace the itemComponentAttributes for IcommerceItem
            if ($entity->type == "Modules\Icommerce\Repositories\ProductRepository") {
              if (isset($this->componentConfig["attributes"]["productItemComponentAttributes"])) {
                $this->componentConfig["attributes"]["itemComponentAttributes"] = $this->componentConfig["attributes"]["productItemComponentAttributes"];
                unset($this->componentConfig["attributes"]["productItemComponentAttributes"]);
              }
            }
            break;
          case 'slider::slider.Owl':
            $this->componentConfig["attributes"]["id"] = $entity->id;
            break;
          case 'isite::items-list':
            $entityTypeExploded = explode("\\", str_replace("/", "\\", $entity->type));
            $this->componentConfig["attributes"]["moduleName"] = $entityTypeExploded[1];
            $this->componentConfig["attributes"]["entityName"] = $entityTypeExploded[3];
            break;
          case 'isite::lists':
            $this->componentConfig["attributes"]["repository"] = $entity->type;
            $this->componentConfig["attributes"]["params"] = json_decode(json_encode($entity->params), true);
            // Replace the itemComponentAttributes for IcommerceItem
            if ($entity->type == "Modules\Icommerce\Repositories\ProductRepository") {
              if (isset($this->componentConfig["attributes"]["productItemComponentAttributes"])) {
                $this->componentConfig["attributes"]["itemComponentAttributes"] = $this->componentConfig["attributes"]["productItemComponentAttributes"];
                unset($this->componentConfig["attributes"]["productItemComponentAttributes"]);
              }
            }
            break;
          case 'isite::item-list':
            $this->componentConfig["attributes"]["item"] = $this->getInheritcontent($entity);
            break;
        }
      }
    }
  }

  /**
   * Get the inherit content for components
   *
   * @return void
   */
  public function getInheritcontent()
  {
    //Return the attribute inherit content
    if ($this->inheritContent) return $this->inheritContent;
    //Get the entity information
    $entity = $this->blockConfig->entity ?? null;
    if (isset($entity->type) && isset($entity->id)) {
      $model = app($entity->type);
      return $model->find($entity->id);
    }
    //Default response
    return null;
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

