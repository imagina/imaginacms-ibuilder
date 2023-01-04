<?php

return [
  //Media Fillables
  'mediaFillable' => [
    'block' => [
      'internalimage' => 'single',
      'mainimage' => 'single',
      'gallery' => 'multiple'
    ],
  ],
  //Url of the iadmin to manage the blocks themes for clients
  'urlEditBlockTheme' => '/iadmin/#/builder/blocks/client/{blockId}'
];
