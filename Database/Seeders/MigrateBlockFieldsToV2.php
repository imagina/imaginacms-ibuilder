<?php

namespace Modules\Ibuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Ifillable\Entities\Field;
use Illuminate\Support\Str;

class MigrateBlockFieldsToV2 extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    //Names that will be ignored in the field
    $ignoreAttributes = ["mobile_attributes", "medias_multi", "medias_single"];
    //Fields that appear in Block Component
    $blockComponentAttributes = ["block_subtitle", "block_title"];
    //Names that will be placed by default
    $defaultMainNames = ['componentAttributes', 'mainblock'];

    //Get current fields with transaltions
    $currentFields = Field::where('entity_type', 'Modules\Ibuilder\Entities\Block')->whereNotIn('name', $ignoreAttributes)->with('translations')->get();
    //Check if the default names exist
    $withNewStructure = $currentFields->whereIn('name', $defaultMainNames)->count();

    //If default names exist, the mapping logic is ignored.
    if (!$withNewStructure) {
      $languages = array_keys(\LaravelLocalization::getSupportedLocales());//Get All Translations of the site
      $newFields = [];//Instance newFields

      foreach ($currentFields as $field) {
        //Check if it is a blockComponentAttribute
        $name = in_array($field->name, $blockComponentAttributes) ? 'mainblock' : 'componentAttributes';
        //Instance defaultFields
        $defaultFields = ['entity_id' => $field->entity_id, 'entity_type' => $field->entity_type, 'name' => $name];
        $keyPerInfoBlock = $field->entity_id . "_" . $name;

        //Create first key in response with default values
        if (!isset($newFields[$keyPerInfoBlock])) $newFields[$keyPerInfoBlock] = $defaultFields;

        //Set current field into value of the newField
        foreach ($languages as $lang) {
          if ($field->hasTranslation($lang)) {
            //Get field name
            $fieldName = Str::camel($field->name);
            $newFields[$keyPerInfoBlock][$lang]['value'][$fieldName] = $field->translate($lang)->value;
          }
        }
      }

      //Insert the new fields with the updated structure
      foreach ($newFields as $newField) Field::create($newField);

      //Delete all fields with the old structure
      \DB::table('ifillable__fields')->where('entity_type', "Modules\\Ibuilder\\Entities\\Block")
        ->whereNotIn('name', $defaultMainNames)
        ->delete();
    };
  }
}
