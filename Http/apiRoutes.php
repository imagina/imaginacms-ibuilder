<?php

use Illuminate\Routing\Router;

$router->group(['prefix' =>'/ibuilder/v1'], function (Router $router) {
    $router->apiCrud([
      'module' => 'ibuilder',
      'prefix' => 'blocks',
      'controller' => 'BlockApiController',
      'middleware' => ['index' => []]
    ]);
// append


});
