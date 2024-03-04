<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/ibuilder/v1'], function (Router $router) {
  $router->apiCrud([
    'module' => 'ibuilder',
    'prefix' => 'blocks',
    'controller' => 'BlockApiController',
    'middleware' => ['index' => [], 'show' => []],
    'customRoutes' => [ // Include custom routes if needed
      [
        'method' => 'put', // get,post,put....
        'path' => '/bulk/update', // Route Path
        'uses' => 'bulkUpdate', //Name of the controller method to use
        //'middleware' => [] // if not set up middleware, auth:api will be the default
      ],
      [
        'method' => 'post', // get,post,put....
        'path' => '/bulk/create', // Route Path
        'uses' => 'bulkCreate', //Name of the controller method to use
        //'middleware' => [] // if not set up middleware, auth:api will be the default
      ]
    ]
  ]);

  $router->apiCrud([
    'module' => 'ibuilder',
    'prefix' => 'layouts',
    'controller' => 'LayoutApiController',
    //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
    // 'customRoutes' => [ // Include custom routes if needed
    //  [
    //    'method' => 'post', // get,post,put....
    //    'path' => '/some-path', // Route Path
    //    'uses' => 'ControllerMethodName', //Name of the controller method to use
    //    'middleware' => [] // if not set up middleware, auth:api will be the default
    //  ]
    // ]
  ]);
    $router->apiCrud([
      'module' => 'ibuilder',
      'prefix' => 'buildables',
      'controller' => 'BuildableApiController',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []],
      // 'customRoutes' => [ // Include custom routes if needed
      //  [
      //    'method' => 'post', // get,post,put....
      //    'path' => '/some-path', // Route Path
      //    'uses' => 'ControllerMethodName', //Name of the controller method to use
      //    'middleware' => [] // if not set up middleware, auth:api will be the default
      //  ]
      // ]
    ]);
// append


  $router->post("/block/preview", [
    'as' => 'ibuilder.blocks.preview.post',
    'uses' => 'BlockApiController@blockPreview',
  ]);

  $router->post("/layout/preview/{layoutId}", [
    'as' => 'ibuilder.layout.preview.post',
    'uses' => 'LayoutApiController@layoutPreview',
  ]);

});
