<?php

if (!function_exists('mapBlockToRender')) {
  function mapBlockToRender($data, $isPreview = true)
  {
    $locale = locale();//Get current locale
    $fields = [];
    $data = convertObjectValuesToArray($data);
    //Map optional items
    $data['mediasSingle'] = $data['mediasSingle'] ?? [];
    $data['mediasMulti'] = $data['mediasMulti'] ?? [];

    //Instance blockfields
    if (!$isPreview && isset($data['fields'])) {
      foreach ($data['fields'] as $field) $fields[$field['name']] = $field['value'];
    } else {//Instance default fields from locale
      $fields = $data[$locale] ?? [];
    }

    //Parse data
    $component = convertObjectValuesToArray(is_string($data['component']) ? json_decode($data['component']) : $data['component']);
    $entity = convertObjectValuesToArray(is_string($data['entity']) ? json_decode($data['entity']) : $data['entity']);
    $attributes = convertObjectValuesToArray(is_string($data['attributes']) ? json_decode($data['attributes']) : $data['attributes']);
    $fields = convertObjectValuesToArray(is_string($fields) ? json_decode($fields) : $fields);
    $mediaSingle = convertObjectValuesToArray(is_string($data['mediasSingle']) ? json_decode($data['mediasSingle']) : $data['mediasSingle']);
    $mediasMulti = convertObjectValuesToArray(is_string($data['mediasMulti']) ? json_decode($data['mediasMulti']) : $data['mediasMulti']);

    //Merge fields into attributes
    foreach ($fields as $fieldName => $field) {
      if (is_string($field)) $attributes[$fieldName] = $fieldName;
      else if (!is_null($field)) $attributes[$fieldName] = array_merge(($attributes[$fieldName] ?? []), $field);
    }

    //Instance the response
    $response = [
      "id" => $data["id"],
      "status" => $data["status"],
      "systemName" => $data["system_name"] ?? $data["systemName"],
      "gridPosition" => $data["gridPosition"] ?? $data["grid_position"] ?? 'col-12',
      "sortOrder" => $data["sortOrder"] ?? $data["sort_order"] ?? 0,
      "parentSystemName" => $data["parentSystemName"] ?? $data["parent_system_name"] ?? null,
      "component" => $component,
      "entity" => $entity,
      "attributes" => $attributes,
      "mediaFiles" => $data["mediaFiles"] ?? []
    ];

    //Added media files for preview as mediaSingle and mediasMulti
    if ($isPreview) {
      $response["mediasSingle"] = $mediaSingle;
      $response["mediasMulti"] = $mediasMulti;
    } else {// Put mediaFiles only with ID NOT allow default images
      foreach (($data['mediaFiles'] ?? []) as $zone => $file) {
        if (isset($file['id']) && $file['id']) $response["mediaFiles"][$zone] = $file;
      }
    }

    //Response
    return $response;
  }
}

if (!function_exists('orderBlocksToRender')) {
  function orderBlocksToRender($blocks, $isPreview = false)
  {
    //Sort and map blocks
    $blocks = collect($blocks)->map(function ($block) use ($isPreview) {
      return mapBlockToRender($block, $isPreview);
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

if (!function_exists('BlocksToArray')) {
  function blocksToArray($blocks)
  {
    $response = [];

    //Parse To array the blocks and include relations data if needed
    foreach ($blocks as $block) {
      $hasPivot = $block->relationLoaded('pivot');
      $response[] = array_merge(
        $block->toArray(), [
        "mediaFiles" => $block->mediaFiles(),
        "layout_id" => $hasPivot ? $block->pivot->layout_id : 0,
        "sort_order" => $hasPivot ? $block->pivot->sort_order : 0,
        "parent_system_name" => $hasPivot ? $block->pivot->parent_system_name : 0,
        "grid_position" => $hasPivot ? $block->pivot->grid_position : 0,
        "system_name" => $hasPivot ? $block->pivot->system_name : $block->system_name
      ]);
    }

    //Response
    return $response;
  }
}
