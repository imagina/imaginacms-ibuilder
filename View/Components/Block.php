<?php

namespace Modules\Ibuilder\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Collective\Html\Componentable;
use Illuminate\Support\Facades\Blade;
use Modules\Ibuilder\Entities\Block as BlockEntity;
use Modules\Ifillable\Transformers\FieldTransformer;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;

class Block extends Component
{
  use MediaRelation;

  public $container, $id, $columns, $background, $borderForm, $display,
    $widthContainer, $heightContainer, $backgrounds, $paddingX, $paddingY, $editLink, $tooltipEditLink,
    $marginX, $marginY, $overlay, $backgroundColor, $componentIsite, $componentType, $isBlade, $view,
    $systemName, $blockConfig, $componentConfig, $blockClasses, $blockStyle, $row, $inheritContent;

  public function __construct(
    $container = null,
    $id = null,
    $columns = null,
    $borderForm = null,
    $display = null,
    $widthContainer = "100%",
    $heightContainer = "auto",
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
    $inheritContent = null
  )
  {
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
    $this->widthContainer = $params["widthContainer"];
    $this->heightContainer = $params["heightContainer"];
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
        $block = BlockEntity::where("system_name", $this->systemName)->with('fields')->first();
        if ($block) {
          //Parse block Attributes
          $blockAttributes = $block->attributes->toArray();
          //Get and add block Fields in attributes
          $blockFields = $block->formatFillableToModel(fieldTransformer::collection($block->fields));
          $blockAttributes["componentAttributes"] = array_merge(($blockAttributes["componentAttributes"] ?? []), $blockFields);
          //nstance the blockConfig
          $this->blockConfig = [
            "component" => $block->component,
            "entity" => $block->entity,
            "attributes" => $blockAttributes
          ];
          //Instance the block edit link
          $this->editLink = str_replace("{blockId}", $block->id, config('asgard.ibuilder.config.urlEditBlockTheme'));
        }
      }
    }
    //Parse
    $this->blockConfig = json_decode(json_encode($this->blockConfig));
  }

  /**
   * Instance the Media files related to the block
   *
   * @param $params
   * @return void
   */
  public function instanceBlockConfigFiles($params)
  {
    //Instance the media attributes
    $componentAttrs = $this->blockConfig->attributes->componentAttributes;
    $mediasSingle = (array)($componentAttrs->medias_single ?? []);
    $mediasMulti = (array)($componentAttrs->medias_multi ?? []);
    //Instance the blockConfigfiles
    $this->blockConfig->mediaFiles = array_merge(
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
      $this->blockConfig->mediaFiles[$singleZone] = !$singleFile ? null : $this->transformFile($singleFile);
    }
    //Set files of media multi
    foreach (array_keys($mediasMulti) as $multiZone) {
      $multiFiles = $filesData->whereIn('id', ($mediasMulti[$multiZone]->files ?? []));
      $this->blockConfig->mediaFiles[$multiZone] = !$multiFiles->count() ? [] : $multiFiles->map(function ($file, $keyFile) {
        return $this->transformFile($file);
      })->toArray();
    }
    //Set blockConfig media File
    $this->blockConfig->mediaFiles = json_decode(json_encode($this->blockConfig->mediaFiles));
    $this->blockConfig->attributes->componentAttributes->mediaFiles = $this->blockConfig->mediaFiles;
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
    return view($this->view);
  }
}

