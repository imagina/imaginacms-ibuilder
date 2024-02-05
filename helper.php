<?php

use Illuminate\Http\Request;

if (!function_exists('mapBlockToRender')) {
  function mapBlockToRender($data, $fields = null)
  {
    $data = convertObjectValuesToArray($data);
    $locale = locale();//Get current locale

    //Parse data
    $component = convertObjectValuesToArray(is_string($data['component']) ? json_decode($data['component']) : $data['component']);
    $entity = convertObjectValuesToArray(is_string($data['entity']) ? json_decode($data['entity']) : $data['entity']);
    $attributes = convertObjectValuesToArray(is_string($data['attributes']) ? json_decode($data['attributes']) : $data['attributes']);
    $fields = convertObjectValuesToArray($fields ?? (is_string($data[$locale]) ? json_decode($data[$locale]) : $data[$locale]));

    //Merge fields into attributes
    foreach ($fields as $fieldName => $field) {
      if (is_string($field)) $attributes[$fieldName] = $fieldName;
      else $attributes[$fieldName] = array_merge(($attributes[$fieldName] ?? []), $field);
    }

    //Instance the response
    $response = [
      "id" => $data["id"],
      "status" => $data["status"],
      "gridPosition" => $data["gridPosition"],
      "sortOrder" => $data["sortOrder"],
      "parentId" => $data["parentId"],
      "component" => $component,
      "entity" => $entity,
      "attributes" => $attributes,
    ];

    //Response
    return $response;
  }
}

if (!function_exists('orderBlocksToRender')) {
  function orderBlocksToRender($blocks, $parentId = 0)
  {
    $tree = [];
    $blocks = collect($blocks)->sortBy('sortOrder')->map(function ($block) use($parentId) {
      return !$parentId ? mapBlockToRender($block) : $block;
    })->toArray();

    foreach ($blocks as $block) {
      if ($block['parentId'] == $parentId) {
        $block['attributes']['children'] = orderBlocksToRender($blocks, $block['id']);
        $tree[] = $block;
      }
    }

    return $tree;
  }
}
