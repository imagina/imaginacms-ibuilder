<?php

use Illuminate\Routing\Router;

Route::prefix('/ibuilder/v1')->group(function (Router $router) {
    $router->apiCrud([
        'module' => 'ibuilder',
        'prefix' => 'blocks',
        'controller' => 'BlockApiController',
        'middleware' => ['index' => [], 'show' => []],
        'customRoutes' => [ // Include custom routes if needed
          [
            'method' => 'put',
            'path' => '/bulk/update',
            'uses' => 'bulkUpdate',
            //'middleware' => []
          ],
          [
            'method' => 'post',
            'path' => '/bulk/create',
            'uses' => 'bulkCreate',
            //'middleware' => []
          ]
        ]
    ]);

    $router->apiCrud([
      'module' => 'ibuilder',
      'prefix' => 'layouts',
      'controller' => 'LayoutApiController',
      'middleware' => ['index' => [], 'show' => []],
    ]);

    $router->apiCrud([
      'module' => 'ibuilder',
      'prefix' => 'buildables',
      'controller' => 'BuildableApiController',
      'middleware' => ['index' => [], 'show' => []],
    ]);

    $router->apiCrud([
      'module' => 'ibuilder',
      'prefix' => 'layout-blocks',
      'controller' => 'LayoutBlockApiController',
      'middleware' => ['index' => [], 'show' => []],
      'customRoutes' => [
        [
          'method' => 'put',
          'path' => '/bulk/update',
          'uses' => 'bulkUpdate',
          //'middleware' => []
        ]
      ],
    ]);

    // append
    $router->post('/block/preview', [
        'as' => 'ibuilder.blocks.preview.post',
        'uses' => 'BlockApiController@blockPreview',
    ]);

    $router->post("/layout/preview/{layoutId}", [
      'as' => 'ibuilder.layout.preview.post',
      'uses' => 'LayoutApiController@layoutPreview',
    ]);

});
