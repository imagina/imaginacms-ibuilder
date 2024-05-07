<?php

return [
    //Media Fillables
    'mediaFillable' => [
        'layout' => [
            'internalimage' => 'single'
        ],
        'block' => [
            'internalimage' => 'single',
            'blockbgimage' => 'single',
            'custommainimage' => 'single',
            'customgallery' => 'multiple',
            'backgroundimg' => 'single',
        ],
    ],
    //Url of the iadmin to manage the blocks themes for clients
    'urlEditBlockTheme' => '/iadmin/#/builder/blocks/client/{blockId}',
  // Builder
  'builder' => [
    'layout' => [
      [
        'entity' => ['label' => "ibuilder::ibuilder.name", 'value' => "Modules\\Ibuilder\\Entities\\Layout"],
        'types' => [
          ['label' => 'Header', 'value' => 'header'],
          ['label' => 'Footer', 'value' => 'footer']
        ]
      ]
    ]
  ]
];
