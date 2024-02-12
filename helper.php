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
      else if(!is_null($field)) $attributes[$fieldName] = array_merge(($attributes[$fieldName] ?? []), $field);
    }

    //Instance the response
    $response = [
      "id" => $data["id"],
      "status" => $data["status"],
      "systemName" => $data["system_name"] ?? $data["systemName"],
      "gridPosition" => $data["gridPosition"] ?? $data["grid_position"] ?? '',
      "sortOrder" => $data["sortOrder"] ?? $data["sort_order"],
      "parentSystemName" => $data["parentSystemName"] ?? $data["parent_system_name"] ?? null,
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
  function buildNestedBlocks($blocks, $parent = null)
  {
    $tree = [];

    foreach ($blocks as $block) {
      $parentSystemName = $block['parentSystemName'] ?? $block['parent_system_name'] ?? null;
      if ($parentSystemName == $parent) {
        $block['attributes']['children'] = buildNestedBlocks($blocks, $block['systemName'] ?? $block['system_name']);
        $tree[] = $block;
      }
    }

    return $tree;
  }
}
