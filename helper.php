<?php

use Illuminate\Http\Request;

if (!function_exists('mapBlockToRender')) {
  function mapBlockToRender($data, $useFields = false)
  {
    $data = convertObjectValuesToArray($data);
    $locale = locale();//Get current locale
    $fields = [];

    //Instance blockfields
    if ($useFields && isset($data['fields'])) {
      foreach ($data['fields'] as $field) $fields[$field['name']] = $field['value'];
    } else {//Instance default fields from locale
      $fields = $data[$locale] ?? [];
    }

    //Parse data
    $component = convertObjectValuesToArray(is_string($data['component']) ? json_decode($data['component']) : $data['component']);
    $entity = convertObjectValuesToArray(is_string($data['entity']) ? json_decode($data['entity']) : $data['entity']);
    $attributes = convertObjectValuesToArray(is_string($data['attributes']) ? json_decode($data['attributes']) : $data['attributes']);
    $fields = convertObjectValuesToArray(is_string($fields) ? json_decode($fields) : $fields);

    //Merge fields into attributes
    foreach ($fields as $fieldName => $field) {
      if (is_string($field)) $attributes[$fieldName] = $fieldName;
      else $attributes[$fieldName] = array_merge(($attributes[$fieldName] ?? []), $field);
    }

    //Instance the response
    $response = [
      "id" => $data["id"],
      "status" => $data["status"],
      "gridPosition" => $data["gridPosition"] ?? $data["grid_position"] ?? '',
      "sortOrder" => $data["sortOrder"] ?? $data["sort_order"],
      "parentId" => $data["parentId"] ?? $data["parent_id"],
      "component" => $component,
      "entity" => $entity,
      "attributes" => $attributes,
    ];

    //Response
    return $response;
  }
}

if (!function_exists('orderBlocksToRender')) {
  function orderBlocksToRender($blocks, $useFields = false)
  {
    //Sort and map blocks
    $blocks = collect($blocks)->map(function ($block) use ($useFields) {
      return mapBlockToRender($block, $useFields);
    })->sortBy('sortOrder')->toArray();

    //build tree and response
    return buildNestedBlocks($blocks);
  }
}

if (!function_exists('buildNestedBlocks')) {
  function buildNestedBlocks($blocks, $parentId = 0)
  {
    $tree = [];

    foreach ($blocks as $block) {
      if ($block['parentId'] == $parentId) {
        $block['attributes']['children'] = buildNestedBlocks($blocks, $block['id']);
        $tree[] = $block;
      }
    }

    return $tree;
  }
}
