<?php

$vAttributes = include(base_path() . '/Modules/Isite/Config/standardValuesForBlocksAttributes.php');

return [
  "block" => [
    "title" => "Bloque",
    "systemName" => "x-ibuilder::block",
    "nameSpace" => "Modules\Ibuilder\View\Components\Block",
    "internal" => true,
    "contentFields" => [
      "blockTitle" => [
        "name" => "blockTitle",
        "type" => "input",
        "colClass" => 'col-12',
        "isTranslatable" => true,
        "props" => [
          "label" => "ibuilder::cms.label.title"
        ]
      ],
      "blockSubtitle" => [
        "name" => "blockSubtitle",
        "type" => "input",
        "colClass" => 'col-12',
        "isTranslatable" => true,
        "props" => [
          "label" => "ibuilder::cms.label.subtitle"
        ]
      ],
      "mediasSingle" => [
        "name" => "mediasSingle",
        "value" => [],
        "type" => "media",
        "columns" => "col-12",
        "props" => [
          "label" => "isite::cms.label.backgroundImage",
          'zone' => 'blockbgimage',
          'entity' => 'Modules\\Ibuilder\\Entities\\Block',
          'entityId' => null,
        ]
      ],
      "buttonLabel" => [
        "name" => "buttonLabel",
        "value" => "",
        "colClass" => 'col-12',
        "type" => "input",
        "isTranslatable" => true,
        "props" => [
            "label" => "Texto del botón (bloque)"
        ]
      ],
      "buttonUrl" => [
        "name" => "buttonUrl",
        "type" => "input",
        "value" => "",
        "isTranslatable" => true,
        "colClass" => 'col-12',
        "props" => [
            "label" => "Enlace del botón (bloque)",
        ]
      ],
    ],
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "id" => [
            "name" => "id",
            "type" => "input",
            "props" => [
              "label" => "Ingresar el id",
              "type" => "text"
            ]
          ],
          "container" => [
            "name" => "container",
            "type" => "select",
            "props" => [
              "label" => "Tipo de contenedor",
              "options" => $vAttributes["containers"]
            ]
          ],
          /*"borderForm" => [
              "name" => "borderForm",
              "value" => "rounded-0",
              "type" => "select",
              "props" => [
                  "label" => "background container",
                  "options" => [
                      ["label" => "todos los lados", "value" => "rounded"],
                      ["label" => "esquinas arriba redondeado", "value" => "rounded-top"],
                      ["label" => "esquinas de la derecha redondeado", "value" => "rounded-right"],
                      ["label" => "esquinas de abajo redondeado", "value" => "rounded-bottom"],
                      ["label" => "esquinas de la izquierda redondeado", "value" => "rounded-left"],
                      ["label" => "en ciruclo", "value" => "rounded-circle"],
                      ["label" => "por defecto", "value" => "rounded-0"]
                  ]
              ]
          ],
          "display" => [
              "name" => "display",
              "value" => "none",
              "type" => "select",
              "props" => [
                  "label" => "display container",
                  "options" => $vAttributes["display"]
              ]
          ],
          "paddingX" => [
              "name" => "paddingX",
              "type" => "input",
              "props" => [
                  "label" => "padding large",
                  "type" => "number"
              ]
          ],
          "paddingY" => [
              "name" => "paddingY",
              "type" => "input",
              "props" => [
                  "label" => "padding lenght",
                  "type" => "number"
              ]
          ],
          "marginX" => [
              "name" => "marginX",
              "type" => "input",
              "props" => [
                  "label" => "margin large",
                  "type" => "number"
              ]
          ],
          "marginY" => [
              "name" => "marginY",
              "type" => "input",
              "props" => [
                  "label" => "margin lenght",
                  "type" => "number"
              ]
          ],
          */
          "overlay" => [
            "name" => "overlay",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Opacidad"
            ]
          ],
          "backgroundColor" => [
            "name" => "backgroundColor",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Gradiente de fondo"
            ]
          ],
          "backgrounds" => [
            "name" => "backgrounds",
            "type" => "json",
            "columns" => "col-12",
            "value" => ["position" => "center", "size" => "cover", "repeat" => "no-repeat", "color" => "", "attachment" => ""],
            "props" => [
                "label" => "Opciones de Fondo"
            ]
          ],
          "row" => [
            "name" => "row",
            "value" => "justify-content-center align-items-center",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Fila (Alineación vertical y horizontal)",
            ]
          ],
          "columns" => [
            "name" => "columns",
            "value" => "col-12",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Columnas",
            ]
          ],
          "position" => [
            "name" => "position",
            "value" => "relative",
            "type" => "select",
            "props" => [
                "label" => "Posición",
                "options" => [
                    ["label" => "relative", "value" => "relative"],
                    ["label" => "static", "value" => "static"],
                    ["label" => "absolute", "value" => "absolute"],
                    ["label" => "fixed", "value" => "fixed"],
                    ["label" => "sticky", "value" => "sticky"],
                    ["label" => "inherit", "value" => "inherit"],
                    ["label" => "revert", "value" => "revert"],
                    ["label" => "initial", "value" => "initial"],
                    ["label" => "revert-layer", "value" => "revert-layer"],
                    ["label" => "unset", "value" => "unset"],
                ],
            ]
          ],
          "zIndex" => [
            "name" => "zIndex",
            "type" => "input",
            "props" => [
                "label" => "Orden entre elementos (z-index)"
            ]
          ],
          "top" => [
            "name" => "top",
            "type" => "input",
            "props" => [
                "label" => "Posición Superior (Top)"
            ]
          ],
          "bottom" => [
            "name" => "bottom",
            "type" => "input",
            "props" => [
                "label" => "Posición Inferior (Bottom)"
            ]
          ],
          "left" => [
            "name" => "left",
            "type" => "input",
            "props" => [
                "label" => "Posición Izquierda (Left)"
            ]
          ],
          "right" => [
            "name" => "right",
            "type" => "input",
            "props" => [
                "label" => "Posición Derecha (Right)"
            ]
          ],
          "width" => [
            "name" => "width",
            "value" => "auto",
            "type" => "input",
            "props" => [
                "label" => "Ancho del Bloque",
            ]
          ],
          "height" => [
            "name" => "height",
            "value" => "auto",
            "type" => "input",
            "props" => [
                "label" => "Alto del Bloque",
            ]
          ],
          "blockClasses" => [
            "name" => "blockClasses",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Bloque de Clases"
            ]
          ],
          "blockStyle" => [
            "name" => "blockStyle",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Bloque de Estilos",
              'type' => 'textarea',
              'rows' => 10,
            ]
          ],
        ]
      ],
      "boton" => [
        "title" => "Botón",
        "fields" => [
            "withButton" => [
                "name" => "withButton",
                "value" => "0",
                "type" => "select",
                "props" => [
                    "label" => "Mostrar",
                    "options" => $vAttributes["validation"]
                ]
            ],
            "buttonPosition" => [
                "name" => "buttonPosition",
                "value" => "1",
                "type" => "select",
                "props" => [
                    "label" => "Posicion",
                    "options" => [
                        ["label" => "Arriba", "value" => "0"],
                        ["label" => "Abajo", "value" => "1"],
                    ],
                ]
            ],
            "buttonLayout" => [
                "name" => "buttonLayout",
                "value" => "",
                "type" => "select",
                "props" => [
                    "label" => "Estilo de Botones",
                    "options" => $vAttributes["buttonStyle"]
                ]
            ],
            "buttonSize" => [
                "name" => "buttonSize",
                "value" => "button-normal",
                "type" => "select",
                "props" => [
                    "label" => "Espaciado",
                    "options" => $vAttributes["buttonType"]
                ]
            ],
            "buttonAlign" => [
                "name" => "buttonAlign",
                "value" => "text-center",
                "type" => "select",
                "props" => [
                    "label" => "Alineación",
                    "options" => $vAttributes["align"]
                ]
            ],
            "buttonColor" => [
                "name" => "buttonColor",
                "value" => "primary",
                "type" => "select",
                "props" => [
                    "label" => "Color",
                    "options" => $vAttributes["bgColor"]
                ]
            ],
            "buttonTextSize" => [
                "name" => "buttonTextSize",
                "value" => "16",
                "type" => "input",
                "props" => [
                    "label" => "Tamaño del texto",
                    "type" => "number"
                ]
            ],
            "buttonMarginT" => [
                "name" => "buttonMarginT",
                "value" => "mt-0",
                "type" => "select",
                "props" => [
                    "label" => "Margen superior",
                    "options" => $vAttributes["marginT"]
                ]
            ],
            "buttonMarginB" => [
                "name" => "buttonMarginB",
                "value" => "mb-3",
                "type" => "select",
                "props" => [
                    "label" => "Margen Inferior",
                    "options" => $vAttributes["marginB"]
                ]
            ],
            "buttonShadow" => [
                "name" => "buttonShadow",
                "type" => "input",
                "value" => "",
                "props" => [
                    "label" => "Sombra de texto",
                ]
            ],
            "buttonTarget" => [
                "name" => "buttonTarget",
                "value" => "_self",
                "type" => "select",
                "props" => [
                    "label" => "Target",
                    "options" => $vAttributes["target"]
                ]
            ],
            "buttonIcon" => [
                "name" => "buttonIcon",
                "value" => "",
                "type" => "input",
                "props" => [
                    "label" => "Icono"
                ]
            ],
            "buttonIconLR" => [
                "name" => "buttonIconLR",
                "value" => "left",
                "type" => "select",
                "props" => [
                    "label" => "Posición del icono",
                    "options" => [
                        ["label" => "Izquierda", "value" => "left"],
                        ["label" => "Derecha", "value" => "right"]
                    ]
                ]
            ],
            "buttonIconColor" => [
                "name" => "buttonIconColor",
                "type" => "input",
                "props" => [
                    "label" => "Color icon",
                ],
            ],
            "buttonIconColorHover" => [
                "name" => "buttonIconColorHover",
                "type" => "input",
                "props" => [
                    "label" => "Color icon hover",
                ],
            ],
            "buttonClasses" => [
                "name" => "buttonClasses",
                "type" => "input",
                "value" => "",
                "columns" => "col-12",
                "props" => [
                    "label" => "Clases generales",
                ]
            ],
            "buttonConfig" => [
                "name" => "buttonConfig",
                "value" => [
                    'color' => 'var(--white)',
                    'background' => 'var(--primary)',
                    'border' => '0',
                    'transition' => '.4s',
                ],
                "type" => "json",
                "columns" => "col-12",
                "props" => [
                    "label" => "Configuración de Botón Custom",
                ]
            ],
        ]
      ],
      "animationBlock" => [
        "title" => "Animaciones de Entrada",
        "fields" => [
            "animateBlockName" => [
                "name" => "animateBlockName",
                "value" => "",
                "type" => "select",
                "props" => [
                    "label" => "Animacion",
                    "options" => $vAttributes["animationAOS"]
                ]
            ],
            "animateBlockDuration" => [
                "name" => "animateBlockDuration",
                "type" => "input",
                "props" => [
                    "label" => "Duracion"
                ],
                "help" => [
                    "description" => "Valores de 0 a 3000, con paso de 50ms"
                ]
            ],
            "animateBlockOffset" => [
                "name" => "animateBlockOffset",
                "type" => "input",
                "props" => [
                    "label" => "Offset",
                ],
                "help" => [
                    "description" => "Desplazamiento (en px) desde el punto de activación original"
                ]
            ],
            "animateBlockDelay" => [
                "name" => "animateBlockDelay",
                "type" => "input",
                "props" => [
                    "label" => "Delay",
                ],
                "help" => [
                    "description" => "Valores de 0 a 3000, con paso de 50ms"
                ]
            ],
            "animateBlockEasing" => [
                "name" => "animateBlockEasing",
                "value" => "ease",
                "type" => "select",
                "props" => [
                    "label" => "Easing",
                    "options" => $vAttributes["easingAOS"]
                ]
            ],
            "animateBlockOnce" => [
                "name" => "animateBlockOnce",
                "value" => true,
                "type" => "select",
                "props" => [
                    "label" => "One",
                    "options" => $vAttributes["booleanValidation"]
                ],
                "help" => [
                    "description" => "Si la animación debe ocurrir solo una vez, mientras se desplaza hacia abajo"
                ]
            ],
            "animateBlockMirror" => [
                "name" => "animateBlockMirror",
                "value" => true,
                "type" => "select",
                "props" => [
                    "label" => "Mirror",
                    "options" => $vAttributes["booleanValidation"]
                ],
                "help" => [
                    "description" => "Si los elementos deben animarse mientras se desplazan más allá de ellos"
                ]
            ],
        ]
      ],
      "responsive" => [
        "title" => "Responsive Custom",
        "fields" => [
            "blockStyleResponsive" => [
                "name" => "blockStyleResponsive",
                "value" => [],
                "type" => "json",
                'columns' => 'col-12',
                "props" => [
                    "label" => "Responsive Custom"
                ],
                "help" => [
                    "description" => "Responsive Custom"
                ],
            ],
        ]
      ],
    ]
  ],
  "custom" => [
    "title" => "Entorno Custom",
    "systemName" => "ibuilder::block-custom",
    "nameSpace" => "Modules\Ibuilder\View\Components\BlockCustom",
    "contentFields" => [
      "titleCustom" => [
        "name" => "titleCustom",
        "type" => "input",
        "colClass" => 'col-12',
        "isTranslatable" => true,
        "props" => [
          "label" => "Texto (titulo)"
        ]
      ],
      "subTitleCustom" => [
        "name" => "subTitleCustom",
        "type" => "input",
        "colClass" => 'col-12',
        "isTranslatable" => true,
        "props" => [
          "label" => "Texto (Subtitulo)"
        ]
      ],
      "summaryCustom" => [
        "name" => "summaryCustom",
        "type" => "input",
        "columns" => "col-12",
        "isTranslatable" => true,
        "props" => [
          "label" => "Texto (Resumen)",
          'type' => 'textarea',
          'rows' => 4,
        ]
      ],
      "descriptionCustom" => [
        "name" => "descriptionCustom",
        "type" => "html",
        "isTranslatable" => true,
        "columns" => "col-12",
        "props" => [
          "label" => "Descripcion"
        ]
      ],
      "video" => [
        "name" => "video",
        "type" => "input",
        "isTranslatable" => true,
        "columns" => "col-12",
        "props" => [
            "label" => "Url del video"
        ]
      ],
      "buttonLabel" => [
        "name" => "buttonLabel",
        "isTranslatable" => true,
        "type" => "input",
        "colClass" => 'col-12',
        "props" => [
            "label" => "Texto del Boton Custom"
        ]
      ],
      "buttonHref" => [
        "name" => "buttonHref",
        "isTranslatable" => true,
        "type" => "input",
        "colClass" => 'col-12',
        "props" => [
            "label" => "Enlace del Boton Custom"
        ]
      ],
      "mainImage" => [
        'value' => (object)['custommainimage' => null],
        'name' => 'mediasSingle',
        'type' => 'media',
        "columns" => "col-12",
        "isTranslatable" => false,
        'props' => [
          'label' => 'Imagen Principal',
          'zone' => 'custommainimage',
          'entity' => "Modules\Ibuilder\Entities\Block",
          'entityId' => null
        ]
      ],
      "gallery" => [
        'value' => (object)['customgallery' => []],
        'name' => 'mediasMulti',
        'type' => 'media',
        "columns" => "col-12",
        "isTranslatable" => false,
        'props' => [
          'label' => 'Galería',
          'zone' => 'customgallery',
          'maxFiles' => 12,
          'entity' => "Modules\Ibuilder\Entities\Block",
          'entityId' => null
        ]
      ],
    ],
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "includeCustom" => [
            "name" => "includeCustom",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Include adicional",
            ]
          ],
          "position" => [
            "name" => "position",
            "value" => "1",
            "type" => "select",
            "columns" => "col-12",
            "props" => [
              "label" => "Posicion de los elementos",
              "options" => [
                ["label" => "Una columna", "value" => "1"],
                ["label" => "Dos columnas (imagen, video a la izquierda)", "value" => "2"],
                ["label" => "Dos columnas (imagen, video a la derecha)", "value" => "3"],
                ["label" => "Titulo mas dos columnas (imagen, video a la izquierda)", "value" => "4"],
                ["label" => "Titulo mas dos columnas (imagen, video a la derecha)", "value" => "5"],
              ],
            ]
          ],
          "mediaClasses" => [
            "name" => "mediaClasses",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Clases en Imagen o Video"
            ]
          ],
          "contentClasses" => [
            "name" => "contentClasses",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Clases en contenido"
            ]
          ],
          "gridColumns" => [
            "name" => "gridColumns",
            "value" => "repeat(2, minmax(0, 1fr))",
            "type" => "input",
            "props" => [
              "label" => "Ancho de columnas"
            ]
          ],
          "gridGap" => [
            "name" => "gridGap",
            "value" => "15px",
            "type" => "input",
            "props" => [
              "label" => "Espacio entre columnas"
            ]
          ],
          "orderClasses" => [
            "name" => "orderClasses",
            "value" => ["video" => "order-0", "image" => "order-1", "title" => "order-2", "subtitle" => "order-3", "summary" => "order-4", "description" => "order-5", "buttom" => "order-6"],
            "type" => "json",
            "columns" => "col-12",
            "props" => [
              "label" => "Orden de los elementos"
            ]
          ],
        ]
      ],
      "text" => [
        "title" => "Contenido",
        "fields" => [
          "titleClasses" => [
            "name" => "titleClasses",
            "type" => "input",
            "columns" => "col-md-7",
            "props" => [
              "label" => "Clases (titulo)"
            ]
          ],
          "titleSize" => [
            "name" => "titleSize",
            "type" => "input",
            "columns" => "col-md-5",
            "props" => [
              "label" => "Tamaño Fuente (titulo)"
            ]
          ],
          "subTitleClasses" => [
            "name" => "subTitleClasses",
            "type" => "input",
            "columns" => "col-md-7",
            "props" => [
              "label" => "Clases (Subtitulo)"
            ]
          ],
          "subTitleSize" => [
            "name" => "subTitleSize",
            "type" => "input",
            "columns" => "col-md-5",
            "props" => [
              "label" => "Tamaño Fuente (Subtitulo)"
            ]
          ],
          "summaryClasses" => [
            "name" => "summaryClasses",
            "type" => "input",
            "columns" => "col-md-7",
            "props" => [
              "label" => "Clases (Resumen)"
            ]
          ],
          "summarySize" => [
            "name" => "summarySize",
            "type" => "input",
            "columns" => "col-md-5",
            "props" => [
              "label" => "Tamaño Fuente (Resumen)"
            ]
          ],
          "descriptionClasses" => [
            "name" => "descriptionClasses",
            "type" => "input",
            "columns" => "col-md-12",
            "props" => [
                "label" => "Clases (Descripción)"
            ]
          ],
        ]
      ],
      "media" => [
        "title" => "Imagen y Video",
        "fields" => [
          "imageOnClasses" => [
            "name" => "imageOnClasses",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Clases sobre (Imagen)"
            ]
          ],
          "imageInClasses" => [
            "name" => "imageInClasses",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Clases en (Imagen)"
            ]
          ],
          "imageStyles" => [
            "name" => "imageStyles",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Estilos adicionales (Imagen)"
            ]
          ],
          "videoResponsive" => [
            "name" => "videoResponsive",
            "type" => "select",
            "columns" => "col-12",
            "props" => [
              "label" => "Responsive (Video)",
              "options" => $vAttributes["embedResponsive"]
            ]
          ],
          "videoClasses" => [
            "name" => "videoClasses",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
              "label" => "Clases (Video)"
            ]
          ],
        ]
      ],
      "boton" => [
        "title" => "Boton",
        "fields" => [
          "withButton" => [
            "name" => "withButton",
            "value" => "0",
            "type" => "select",
            "props" => [
              "label" => "Mostrar",
              "options" => $vAttributes["validation"]
            ]
          ],
          "buttonSizeLabel" => [
            "name" => "buttonSizeLabel",
            "type" => "input",
            "props" => [
              "label" => "Tamaño del texto",
              "type" => "number"
            ]
          ],
          "buttonIconClass" => [
            "name" => "buttonIconClass",
            "type" => "input",
            "props" => [
              "label" => "Tipo de Icono"
            ]
          ],
          "buttonIconPosition" => [
            "name" => "buttonIconPosition",
            "value" => "left",
            "type" => "select",
            "props" => [
              "label" => "Posición del icono",
              "options" => [
                ["label" => "Izquierda", "value" => "left"],
                ["label" => "Derecha", "value" => "right"]
              ]
            ]
          ],
          "buttonLayout" => [
            "name" => "buttonLayout",
            "value" => "",
            "type" => "select",
            "props" => [
              "label" => "Estilo de Botones",
              "options" => $vAttributes["buttonStyle"]
            ]
          ],
          "buttonStyle" => [
            "name" => "buttonStyle",
            "value" => "button-normal",
            "type" => "select",
            "props" => [
              "label" => "Espaciado",
              "options" => $vAttributes["buttonType"]
            ]
          ],
          "buttonClasses" => [
            "name" => "buttonClasses",
            "type" => "input",
            "props" => [
              "label" => "Clases en general",
            ]
          ],
          "buttonAlign" => [
            "name" => "buttonAlign",
            "type" => "select",
            "props" => [
              "label" => "Alineación",
              "options" => $vAttributes["align"]
            ]
          ],
          "buttonTarget" => [
            "name" => "buttonTarget",
            "type" => "select",
            "props" => [
              "label" => "Target",
              "options" => $vAttributes["target"]
            ]
          ],
          "buttonColor" => [
            "name" => "buttonColor",
            "value" => "primary",
            "type" => "select",
            "props" => [
              "label" => "Color",
              "options" => $vAttributes["bgColor"]
            ]
          ],
          "buttonConfig" => [
            "name" => "buttonConfig",
            "value" => [
                'color' => 'var(--white)',
                'background' => 'var(--primary)',
                'border' => '0',
                'transition' => '.4s',
            ],
            "type" => "json",
            "columns" => "col-12",
            "props" => [
                "label" => "Configuración de Botón Custom",
            ]
          ],
        ]
      ],
    ]
  ],
  "container" => [
    "title" => "Contenedor",
    "systemName" => "x-ibuilder::container",
    "nameSpace" => "Modules\Ibuilder\View\Components\Container",
    "allowChildren" => true,
    "contentFields" => [
        "backgroundImg" => [
            'value' => (object)['backgroundImg' => null],
            'name' => 'mediasSingle',
            "type" => "media",
            "columns" => "col-12",
            "props" => [
                "label" => "isite::cms.label.backgroundImage",
                'zone' => 'backgroundimg',
                'entity' => 'Modules\\Ibuilder\\Entities\\Block',
                'entityId' => null,
            ]
        ]
    ],
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "id" => [
            "name" => "id",
            "type" => "input",
            "props" => [
              "label" => "Ingresar el id",
              "type" => "text"
            ]
          ],
          "containerBlock" => [
            "name" => "containerBlock",
            "type" => "select",
            "props" => [
                "label" => "Tipo de contenedor",
                "options" => $vAttributes["containers"]
            ]
          ],
          "row" => [
            "name" => "row",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
                "label" => "Fila",
                "type" => "text"
            ]
          ],
          "backgroundGeneral" => [
            "name" => "backgroundGeneral",
            "value" => "",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
                "label" => "Gradiente de fondo"
            ]
          ],
          "styleContainer" => [
            "name" => "styleContainer",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
                "label" => "Estilos generales",
                'type' => 'textarea',
                'rows' => 5,
            ],
            "help" => [
                "description" => "Permite agregar estilos al contenedor",
            ]
          ],
          "backgrounds" => [
            "name" => "backgrounds",
            "type" => "json",
            "columns" => "col-12",
            "value" => ["position" => "center", "size" => "cover", "repeat" => "no-repeat", "color" => "", "attachment" => ""],
            "props" => [
                "label" => "Opciones de Fondo"
            ]
          ],
          "scriptContainer" => [
            "name" => "scriptContainer",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
                "label" => "Script",
                'type' => 'textarea',
                'rows' => 10,
            ],
          ],
        ]
      ]
    ]
  ],
  "breadcrumb" => [
    "title" => "Breadcrumb Custom",
    "systemName" => "ibuilder::breadcrumb-custom",
    "nameSpace" => "Modules\Ibuilder\View\Components\BreadcrumbCustom",
    "useViewParams" => true,
    "content" => [
        [
            "label" => "Page",
            "value" => "Modules\Page\Entities\Page",
            "loadOptions" => [
                "apiRoute" => "apiRoutes.qpage.pages"
            ]
        ],
        [
            "label" => "Posts",
            "value" => "Modules\Iblog\Entities\Post",
            "loadOptions" => [
                "apiRoute" => "apiRoutes.qblog.posts"
            ]
        ],
        [
            "label" => "Categories",
            "value" => "Modules\Iblog\Entities\Category",
            "loadOptions" => [
                "apiRoute" => "apiRoutes.qblog.categories"
            ]
        ],
    ],
    "attributes" => [
        "general" => [
            "title" => "General",
            "fields" => [
                "sectionClass" => [
                    "name" => "sectionClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clase general",
                    ],
                ],
                "sectionStyle" => [
                    "name" => "sectionStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos general",
                        'type' => 'textarea',
                        'rows' => 4,
                    ],
                ],
                "container" => [
                    "name" => "container",
                    "value" => "container",
                    "type" => "select",
                    "props" => [
                        "label" => "Tipo de contenedor",
                        "options" => $vAttributes["containers"]
                    ]
                ],
                "containerClass" => [
                    "name" => "containerClass",
                    "type" => "input",
                    "props" => [
                        "label" => "Clase Container",
                    ],
                ],
                "row" => [
                    "name" => "row",
                    "value" => "row align-items-center",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Fila",
                    ],
                ],
                "col" => [
                    "name" => "col",
                    "value" => "col-auto",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Columna",
                    ],
                ],
                "icon" => [
                    "name" => "icon",
                    "type" => "input",
                    "props" => [
                        "label" => "Caracter",
                        "help" => [
                            "description" => "Ejemplo / > < *",
                        ]
                    ],
                ],
                "iconFont" => [
                    "name" => "iconFont",
                    "type" => "input",
                    "props" => [
                        "label" => "Icono Font",
                    ],
                    "help" => [
                        "description" => "Icon Font tiene prioridad, colocar el codigo unicode sin el '\'",
                    ]
                ],
                "breadcrumbPosition" => [
                    "name" => "breadcrumbPosition",
                    "value" => "0",
                    "columns" => "col-12",
                    "type" => "select",
                    "props" => [
                        "label" => "Posición del breadcrumb",
                        "options" => [
                            ["label" => "Arriba de la imagen", "value" => "0"],
                            ["label" => "Debajo de la imagen", "value" => "1"],
                            ["label" => "Dentro de la imagen", "value" => "2"],
                        ]
                    ]
                ],
                "breadcrumbClass" => [
                    "name" => "breadcrumbClass",
                    "type" => "input",
                    "value" => "bg-transparent px-0 mb-0",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases breadcrumb",
                    ],
                ],
                "breadcrumbFontSize" => [
                    "name" => "breadcrumbFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente",
                        "type" => "number"
                    ]
                ],
                "breadcrumbColor" => [
                    "name" => "breadcrumbColor",
                    "type" => "input",
                    "props" => [
                        "label" => "Color",
                    ]
                ],
                "breadcrumbStyle" => [
                    "name" => "breadcrumbStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos breadcrumb",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                ],
            ]
        ],
        "title" => [
            "title" => "Titulo",
            "fields" => [
                "withTitle" => [
                    "name" => "withTitle",
                    "value" => "0",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Titulo",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "fontSizeTitle" => [
                    "name" => "fontSizeTitle",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente",
                        "type" => "number"
                    ]
                ],
                "colorTitleByClass" => [
                    "name" => "colorTitleByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "colorTitle" => [
                    "name" => "colorTitle",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "titlePosition" => [
                    "name" => "titlePosition",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Posición",
                        "options" => [
                            ["label" => "Debajo", "value" => "1"],
                            ["label" => "Arriba", "value" => "2"],
                        ],
                    ],
                    "help" => [
                        "description" => "Funciona cuando el breadcrumb esta dentro de la imagen",
                    ]
                ],
                "titleClass" => [
                    "name" => "titleClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "titleStyle" => [
                    "name" => "titleStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en titulo",
                    ]
                ],
            ]
        ],
        "image" => [
            "title" => "Imagen",
            "fields" => [
                "withImage" => [
                    "name" => "withImage",
                    "value" => "0",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Imagen",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "overlary" => [
                    "name" => "overlay",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Overlay",
                    ],
                ],
                "imageAspectRatio" => [
                    "name" => "imageAspectRatio",
                    "value" => "21/5",
                    "type" => "select",
                    "props" => [
                        "label" => "Aspect Ratio",
                        "options" => $vAttributes["imageAspect"]
                    ]
                ],
                "imageAspectRatioMobile" => [
                    "name" => "imageAspectRatioMobile",
                    "value" => "16/9",
                    "type" => "select",
                    "props" => [
                        "label" => "Aspect Ratio Mobile",
                        "options" => $vAttributes["imageAspect"]
                    ]
                ],
                "imageObjectFit" => [
                    "name" => "imageObjectFit",
                    "value" => "cover",
                    "type" => "select",
                    "props" => [
                        "label" => "Object fit",
                        "options" => $vAttributes["imageObject"]
                    ]
                ],
                "imageObjectPosicion" => [
                    "name" => "imageObjectPosicion",
                    "value" => "center",
                    "type" => "input",
                    "props" => [
                        "label" => "Object fit Position",
                    ],
                    "help" => [
                        "description" => "Ejemplo de valores: top, bottom, left, right, center, 25% 75%, 1cm 2cm, bottom 10px right 20px",
                    ]
                ],
                "imageClass" => [
                    "name" => "imageClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "imageStyle" => [
                    "name" => "imageStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                ],
            ]
        ],
    ]
  ],
  "contentCustom" => [
    "title" => "Contenido Custom",
    "systemName" => "ibuilder::content-custom",
    "nameSpace" => "Modules\Ibuilder\View\Components\ContentCustom",
    "useViewParams" => true,
    "content" => [
        [
            "label" => "Page",
            "value" => "Modules\Page\Entities\Page",
            "loadOptions" => [
                "apiRoute" => "apiRoutes.qpage.pages"
            ]
        ],
        [
            "label" => "Posts",
            "value" => "Modules\Iblog\Entities\Post",
            "loadOptions" => [
                "apiRoute" => "apiRoutes.qblog.posts"
            ]
        ],
        [
            "label" => "Categories",
            "value" => "Modules\Iblog\Entities\Category",
            "loadOptions" => [
                "apiRoute" => "apiRoutes.qblog.categories"
            ]
        ],
    ],
    "childBlocks" => [
        "itemListAttr" => "isite::item-list",
    ],
    "contentFields" => [
        "filtersTitle" => [
            "name" => "filtersTitle",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Titulo del filtro de categorias (Blog)",
            ]
        ],
        "itemListTitle" => [
            "name" => "itemListTitle",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Titulo de los Elementos (itemList)",
            ],
            "help" => [
                "description" => "ItemList principal (Blog)",
            ]
        ],
        "itemListLabelButton" => [
            "name" => "itemListLabelButton",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Texto del boton del elemento",
            ]
        ],
        "itemListLateralTitle" => [
            "name" => "itemListLateralTitle",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Titulo de la lista lateral (Blog)",
            ]
        ],
        "carouselTitle" => [
            "name" => "carouselTitle",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Titulo del Carousel (Blog)",
            ]
        ],
    ],
    "attributes" => [
        "general" => [
            "title" => "General",
            "fields" => [
                "row" => [
                    "name" => "row",
                    "value" => "row",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Fila",
                    ],
                ],
                "orderClasses" => [
                    "name" => "orderClasses",
                    "value" => ["list" => "col-12 order-0", "title" => "col-12 order-0", "media" => "col-12 order-1",
                        "body" => "col-12 order-2", "gallery" => "col-12 order-3", "bodyExtra" => "col-12 order-4",
                        "videoExternal" => "col-12 order-5", "share" => "col-12 order-6", "summary" => "col-12 order-7",
                        "category" => "col-12 order-8", "date" => "col-12 order-9", "user" => "col-12 order-10"],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Orden de los elementos"
                    ]
                ],
                "bodyContentInside" => [
                    "name" => "bodyContentInside",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Clases contenido dentro de la descripción",
                    ],
                    "help" => [
                        "description" => "Clases que engloban los componentes cuando se encuentran dentro de la descripción",
                    ]
                ],
                "orderSidebar" => [
                    "name" => "orderSidebar",
                    "value" => ["sidebar" => "col-md-4 pr-lg-5 pb-5", "content" => "col-md-8 pb-5", "content-row" => "row", "extra" => "col-12 pb-5"],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Orden de los elementos extra para el blog"
                    ]
                ],
            ]
        ],
        "title" => [
            "title" => "Titulo",
            "fields" => [
                "withTitle" => [
                    "name" => "withTitle",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Titulo",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "titleFontSize" => [
                    "name" => "titleFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente",
                        "type" => "number"
                    ]
                ],
                "titleLetterSpacing" => [
                    "name" => "titleLetterSpacing",
                    "type" => "input",
                    "props" => [
                        "label" => "Espacio entre letras",
                        "type" => "number"
                    ]
                ],
                "titleAlign" => [
                    "name" => "titleAlign",
                    "value" => "text-left",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "titleColorByClass" => [
                    "name" => "titleColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "titleColor" => [
                    "name" => "titleColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "titleIcon" => [
                    "name" => "titleIcon",
                    "value" => "",
                    "type" => "input",
                    "props" => [
                        "label" => "Icono",
                    ]
                ],
                "titleIconPosition" => [
                    "name" => "titleIconPosition",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Posición del icono",
                        "options" => [
                            ["label" => "Izquierda", "value" => "1"],
                            ["label" => "Derecha", "value" => "2"],
                            ["label" => "Arriba", "value" => "3"],
                            ["label" => "Abajo", "value" => "4"],
                        ],
                    ]
                ],
                "titleIconStyle" => [
                    "name" => "titleIconStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos del icono",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en el icono",
                    ]
                ],
                "titleClass" => [
                    "name" => "titleClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases del titulo",
                    ],
                ],
                "titleStyle" => [
                    "name" => "titleStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos del titulo",
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en titulo",
                    ]
                ],
                "withLineTitle" => [
                    "name" => "withLineTitle",
                    "value" => "0",
                    "type" => "select",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Linea",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "lineTitleConfig" => [
                    "name" => "lineTitleConfig",
                    "value" => ['background' => 'var(--primary)','height' => '2px','width' => '10%','margin' => '0 auto'],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Configuración de Línea",
                    ]
                ],
            ]
        ],
        "body" => [
            "title" => "Descripción",
            "fields" => [
                "withBody" => [
                    "name" => "withBody",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "bodyFontSize" => [
                    "name" => "bodyFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente",
                        "type" => "number"
                    ]
                ],
                "bodyAlign" => [
                    "name" => "bodyAlign",
                    "value" => "text-justify",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "bodyColorByClass" => [
                    "name" => "bodyColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "bodyColor" => [
                    "name" => "bodyColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "bodyClass" => [
                    "name" => "bodyClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "bodyStyle" => [
                    "name" => "bodyStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en la descripción",
                    ]
                ],
            ]
        ],
        "media" => [
            "title" => "Imagen o Video",
            "fields" => [
                "withMedia" => [
                    "name" => "withMedia",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "imageZone" => [
                    "name" => "imageZone",
                    "type" => "input",
                    "value" => "mainimage",
                    "props" => [
                        "label" => "Zona"
                    ]
                ],
                "imageAspectRatio" => [
                    "name" => "imageAspectRatio",
                    "value" => "4/3",
                    "type" => "select",
                    "props" => [
                        "label" => "Aspect Ratio",
                        "options" =>  [
                            ["label" => "auto", "value" => "auto"],
                            ["label" => "1/1", "value" => "1/1"],
                            ["label" => "4/3", "value" => "4/3"],
                            ["label" => "4/5", "value" => "4/5"],
                            ["label" => "16/9", "value" => "16/9"],
                            ["label" => "21/9", "value" => "21/9"],
                            ["label" => "21/5", "value" => "21/5"],
                            ["label" => "5/4", "value" => "5/4"],
                            ["label" => "custom", "value" => "aspect-custom"],
                        ]
                    ]
                ],
                "imageAspectRatioCustom" => [
                    "name" => "imageAspectRatioCustom",
                    "type" => "input",
                    "props" => [
                        "label" => "Aspect Ratio Custom",
                    ]
                ],
                "imageObjectFit" => [
                    "name" => "imageObjectFit",
                    "value" => "cover",
                    "type" => "select",
                    "props" => [
                        "label" => "Object fit",
                        "options" => $vAttributes["imageObject"]
                    ]
                ],
                "imageObjectPosicion" => [
                    "name" => "imageObjectPosicion",
                    "value" => "center",
                    "type" => "input",
                    "props" => [
                        "label" => "Object fit Position",
                    ],
                    "help" => [
                        "description" => "Ejemplo de valores: top, bottom, left, right, center, 25% 75%, 1cm 2cm, bottom 10px right 20px",
                    ]
                ],
                "imageClass" => [
                    "name" => "imageClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "imageStyle" => [
                    "name" => "imageStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                ],
                "videoLoop" => [
                    "name" => "videoLoop",
                    "value" => "0",
                    "type" => "select",
                    "props" => [
                        "label" => "Loop",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "videoAutoplay" => [
                    "name" => "videoAutoplay",
                    "value" => "0",
                    "type" => "select",
                    "props" => [
                        "label" => "Autoplay",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "videoMuted" => [
                    "name" => "videoMuted",
                    "value" => "0",
                    "type" => "select",
                    "props" => [
                        "label" => "Muted",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "videoControls" => [
                    "name" => "videoControls",
                    "value" => "0",
                    "type" => "select",
                    "props" => [
                        "label" => "Controls",
                        "options" => $vAttributes["validation"]
                    ]
                ],
            ]
        ],
        "gallery" => [
            "title" => "Galeria",
            "fields" => [
                "withGallery" => [
                    "name" => "withGallery",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "galleryLayout" => [
                    "name" => "galleryLayout",
                    "value" => "gallery-layout-1",
                    "type" => "select",
                    "props" => [
                        "label" => "Layout",
                        "options" => [
                            ["label" => "Layout 1 (Básico)", "value" => "gallery-layout-1"],
                            ["label" => "Layout 2 (Columnas 3 2)", "value" => "gallery-layout-2"],
                            ["label" => "Layout 3 (Masonry)", "value" => "gallery-layout-3"],
                            ["label" => "Layout 4 (Principal y 3 pequeñas)", "value" => "gallery-layout-4"],
                            ["label" => "Layout 5 (3 pequeñas y principal)", "value" => "gallery-layout-5"],
                            ["label" => "Layout 6 (3 columnas con aumento)", "value" => "gallery-layout-6"],
                            ["label" => "Layout 7 (Vertical)", "value" => "gallery-layout-7"]
                        ]
                    ]
                ],
                "galleryResponsive" => [
                    "name" => "galleryResponsive",
                    "value" => [0 => ["items" => 1], 640 => ["items" => 2], 992 => ["items" => 4]],
                    "type" => "json",
                    'columns' => 'col-12',
                    "props" => [
                        "label" => "Responsive"
                    ]
                ],
                "galleryNav" => [
                    "name" => "galleryNav",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar (nav)",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "galleryNavSize" => [
                    "name" => "galleryNavSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño (Nav)",
                        "input" => "number"
                    ]
                ],
                "galleryNavColor" => [
                    "name" => "galleryNavColor",
                    "value" => "var(--dark)",
                    "type" => "input",
                    "props" => [
                        "label" => "Color (Nav)",
                    ]
                ],
                "galleryNavColorHover" => [
                    "name" => "galleryNavColorHover",
                    "value" => "var(--primary)",
                    "type" => "input",
                    "props" => [
                        "label" => "Color Hover (nav)",
                    ]
                ],
                "galleryNavIcons" => [
                    "name" => "galleryNavIcons",
                    "columns" => "col-12",
                    "value" => "fa fa-arrow-left,fa fa-arrow-right",
                    "type" => "input",
                    "props" => [
                        "label" => "Navs Icons",
                    ],
                    "help" => [
                        "description" => "Cuando el layout es el 7 las flechas son 'fa fa-angle-up,fa fa-angle-down'",
                    ]

                ],
                "galleryNavPosition" => [
                    "name" => "galleryNavPosition",
                    "columns" => "col-12",
                    "type" => "select",
                    "props" => [
                        "label" => "Navs Position",
                        "options" => [
                            ["label" => "Centrado Abajo", "value" => "1"],
                            ["label" => "Izquierda Abajo", "value" => "2"],
                            ["label" => "Derecha Abajo", "value" => "3"],
                            ["label" => "Lateral", "value" => "4"],
                            ["label" => "Centrado Arriba", "value" => "5"],
                            ["label" => "Izquierda Arriba", "value" => "6"],
                            ["label" => "Derecha Arriba", "value" => "7"]
                        ]
                    ],
                    "help" => [
                        "description" => "Solo funciona para el layout 1",
                    ]

                ],
                "galleryDots" => [
                    "name" => "galleryDots",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar (dots)",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "galleryDotsStyle" => [
                    "name" => "galleryDotsStyle",
                    "value" => "dots-circular",
                    "type" => "select",
                    "props" => [
                        "label" => "Estilos (dots)",
                        "options" => $vAttributes["dotStyle"]
                    ]
                ],
                "galleryDotsStyleColor" => [
                    "name" => "galleryDotsStyleColor",
                    "type" => "select",
                    "props" => [
                        "label" => "Color (dots)",
                        "options" => $vAttributes["bgColor"]
                    ]
                ],
                "galleryDotsSize" => [
                    "name" => "galleryDotsSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño (dots)",
                        "input" => "number"
                    ]
                ],
                "galleryAspectRatio" => [
                    "name" => "galleryAspectRatio",
                    "value" => "1/1",
                    "type" => "select",
                    "props" => [
                        "label" => "Aspect Ratio",
                        "options" =>  [
                            ["label" => "auto", "value" => "auto"],
                            ["label" => "1/1", "value" => "1/1"],
                            ["label" => "4/3", "value" => "4/3"],
                            ["label" => "4/5", "value" => "4/5"],
                            ["label" => "16/9", "value" => "16/9"],
                            ["label" => "21/9", "value" => "21/9"],
                            ["label" => "21/5", "value" => "21/5"],
                            ["label" => "5/4", "value" => "5/4"],
                            ["label" => "custom", "value" => "aspect-custom"],
                        ]
                    ]
                ],
                "galleryAspectRatioCustom" => [
                    "name" => "galleryAspectRatioCustom",
                    "type" => "input",
                    "props" => [
                        "label" => "Aspect Ratio Custom",
                    ]
                ],
                "galleryObjectFit" => [
                    "name" => "galleryObjectFit",
                    "value" => "cover",
                    "type" => "select",
                    "props" => [
                        "label" => "Object fit",
                        "options" => $vAttributes["imageObject"]
                    ]
                ],
                "galleryObjectPosicion" => [
                    "name" => "galleryObjectPosicion",
                    "value" => "center",
                    "type" => "input",
                    "props" => [
                        "label" => "Object fit Position",
                    ],
                    "help" => [
                        "description" => "Ejemplo de valores: top, bottom, left, right, center, 25% 75%, 1cm 2cm, bottom 10px right 20px",
                    ]
                ],
                "galleryClass" => [
                    "name" => "galleryClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases Gallery",
                    ],
                ],
                "galleryStyle" => [
                    "name" => "galleryStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos Gallery",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                ],
            ]
        ],
        "bodyExtra" => [
            "title" => "Descripción Extra",
            "fields" => [
                "withBodyExtra" => [
                    "name" => "withBodyExtra",
                    "value" => "3",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                        //"options" => $vAttributes["validation"]
                    ]
                ],
                "bodyExtra" => [
                    "name" => "bodyExtra",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Campo Falso de Texto",
                    ],
                    "help" => [
                        "description" => "Escribir el nombre del campo y si hay mas de uno separar por coma (,)",
                    ],
                ],
                "bodyExtraFontSize" => [
                    "name" => "bodyExtraFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente",
                        "type" => "number"
                    ]
                ],
                "bodyExtraAlign" => [
                    "name" => "bodyExtraAlign",
                    "value" => "text-justify",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "bodyExtraColorByClass" => [
                    "name" => "bodyExtraColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "bodyExtraColor" => [
                    "name" => "bodyExtraColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "bodyExtraClass" => [
                    "name" => "bodyExtraClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "bodyExtraStyle" => [
                    "name" => "bodyExtraStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en la descripción",
                    ]
                ],
                "bodyExtraMiniClass" => [
                    "name" => "bodyExtraMiniClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases de cada campo falso de texto",
                    ],
                    "help" => [
                        "description" => "Utilizar especialmente si hay mas de un campo de texto",
                    ]
                ],
            ]
        ],
        "video" => [
            "title" => "Video Externo (Youtube)",
            "fields" => [
                "withVideoExternal" => [
                    "name" => "withVideoExternal",
                    "value" => "3",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Imagen",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "videoExternal" => [
                    "name" => "videoExternal",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Campo Falso de Video",
                    ],
                    "help" => [
                        "description" => "Escribir el nombre del campo y si hay mas de uno separar por coma (,)",
                    ],
                ],
                "videoExternalResponsive" => [
                    "name" => "videoExternalResponsive",
                    "type" => "select",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Responsive (Video)",
                        "options" => $vAttributes["embedResponsive"]
                    ]
                ],
                "videoExternalWidth" => [
                    "name" => "videoExternalWidth",
                    "type" => "input",
                    "props" => [
                        "label" => "Ancho (Formato Libre)",
                    ],
                ],
                "videoExternalHeight" => [
                    "name" => "videoExternalHeight",
                    "type" => "input",
                    "props" => [
                        "label" => "Alto (Formato Libre)",
                    ],
                ],
                "videoExternalClass" => [
                    "name" => "videoExternalClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "videoExternalStyle" => [
                    "name" => "videoExternalStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                ],
                "videoExternalMiniClass" => [
                    "name" => "videoExternalMiniClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases de cada campo falso de video",
                    ],
                    "help" => [
                        "description" => "Utilizar especialmente si hay mas de un campo de video",
                    ]
                ],
            ]
        ],
        "filters" => [
            "title" => "Filtros (Category - Post)",
            "fields" => [
                "withListMain" => [
                    "name" => "withListMain",
                    "value" => null,
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Lista Principal Categoria",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "withFilterCategory" => [
                    "name" => "withFilterCategory",
                    "value" => null,
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Filtro Categoria",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "filters" => [
                    "name" => "filters",
                    "value" => ['name' => 'categories',
                        'typeTitle' => 'titleOfTheConfig',
                        'status' => true,
                        'isExpanded' => true,
                        'type' => 'tree',
                        'repository' => 'Modules\Iblog\Repositories\CategoryRepository',
                        'entityClass' => 'Modules\Iblog\Entities\Category',
                        'params' => ['filter' => ['internal' => false]],
                        'emitTo' => false,
                        'repoAction' => null,
                        'repoAttribute' => null,
                        'listener' => null,
                        'layout' => 'default',
                        'classes' => 'col-12'],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Filtro de categoria",
                    ]
                ],
                "filtersStyle" => [
                    "name" => "filtersStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos filters",
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en el category",
                    ]
                ],
                "itemListType" => [
                    "name" => "itemListType",
                    "value" => "Post",
                    "type" => "select",
                    "props" => [
                        "label" => "Tipo",
                        "options" => [
                            ["label" => "Post", "value" => "Post"],
                            ["label" => "Category", "value" => "Category"],
                        ]
                    ]
                ],
                "itemListTake" => [
                    "name" => "itemListTake",
                    "value" => "8",
                    "type" => "input",
                    "props" => [
                        "label" => "Número de elementos",
                        "type" => "number",
                    ]
                ],
                "itemListCol" => [
                    "name" => "itemListCol",
                    "value" => "col-12 col-md-6 col-lg-4 mb-3",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Columna de elementos",
                    ]
                ],
                "itemListPag" => [
                    "name" => "itemListPag",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Paginación",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "itemListPagType" => [
                    "name" => "itemListPagType",
                    "value" => "normal",
                    "type" => "select",
                    "props" => [
                        "label" => "Tipo",
                        "options" => [
                            ["label" => "Normal", "value" => "normal"],
                            ["label" => "LoadMore", "value" => "loadMore"],
                            ["label" => "InfiniteScroll", "value" => "infiniteScroll"],
                        ]
                    ]
                ],
                "itemListPagStyle" => [
                    "name" => "itemListPagStyle",
                    "value" => ["color" => "var(--dark)",
                        "size" => "12",
                        "width" => "30",
                        "height" => "30",
                        "radius" => "50%",
                        "backgroundActivo" => "var(--primary)",
                        "backgroundInactivo" => "transparent",
                        "colorHover" => "var(--light)",
                        "colorActivo" => "#ffffff",
                        "backgroundHover" => "var(--light)",
                        "margin" => "0"],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilo del Paginador"
                    ]
                ],
                "itemListPagStyleGeneral" => [
                    "name" => "itemListPagStyleGeneral",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilo libre del Paginador",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales al paginador",
                    ]
                ],
                "withListLateral" => [
                    "name" => "withListLateral",
                    "value" => null,
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Lista Latetal",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "itemListLateralAttr" => [
                    "name" => "itemListLateralAttr",
                    "value" => ['withViewMoreButton'=>false,
                        'withCategory'=>false,
                        'withSummary'=>false,
                        'withCreatedDate'=>true,
                        'layout'=>'item-list-layout-7',
                        'imageAspect'=>'4/3',
                        'imageObject'=>'cover',
                        'withTitle'=>true,
                        'titleTextSize'=>'14',
                        'titleTextSizeMobile'=>'14',
                        'titleTextWeight'=>'font-weight-bold',
                        'formatCreatedDate'=>'d \d\e M, Y',
                        'createdDateAlign'=>'text-left',
                        'createdDateTextSize'=>'11',
                        'createdDateTextWeight'=>'font-weight-normal',
                        'imagePosition'=>'2',
                        'imagePositionVertical'=>'align-self-star',
                        'contentPositionVertical'=>'align-self-star',
                        'columnLeft'=>'col-lg-5',
                        'columnRight'=>'col-lg-7 pl-lg-3',
                        'contentMarginInsideX'=>'mx-0',
                        'titleColor'=>'text-dark',
                        'createdDateColor'=>'text-dark',
                        'titleMarginT'=>'mt-2 mt-lg-0',
                        'titleMarginB'=>'mb-0 mb-md-2',
                        'createdDateMarginT'=>'mt-1',
                        'createdDateMarginB'=>'mb-1',
                        'contentPaddingLeft'=>'0',
                        'contentPaddingRight'=>'0',
                        'titleHeight'=>35],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Atributos items  (Lista)"
                    ]
                ],
                "itemListLateralType" => [
                    "name" => "itemListLateralType",
                    "value" => "Post",
                    "type" => "select",
                    "props" => [
                        "label" => "Tipo  (Lista)",
                        "options" => [
                            ["label" => "Post", "value" => "Post"],
                            ["label" => "Category", "value" => "Category"],
                        ]
                    ]
                ],
                "itemListLateralTake" => [
                    "name" => "itemListLateralTake",
                    "value" => "3",
                    "type" => "input",
                    "props" => [
                        "label" => "Número de elementos (Lista)",
                        "type" => "number",
                    ]
                ],
                "itemListLateralCol" => [
                    "name" => "itemListLateralCol",
                    "value" => "col-12 mb-4",
                    "columns" => "col-12",
                    "type" => "input",
                    "props" => [
                        "label" => "Columna de elementos (Lista)",
                    ]
                ],
                "withCarousel" => [
                    "name" => "withCarousel",
                    "value" => null,
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar Carousel",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "carouselAttr" => [
                    "name" => "carouselAttr",
                    "value" => ["take" => "20",
                        "margin" => "20",
                        "loops" => false,
                        "dots" => false,
                        "titleClasses" => "",
                        "dotsStyle" => "",
                        "dotsStyleColor" => "",
                        "dotsSize" => "",
                        "mediaImage" => "mainimage",
                        "autoplay" => false,
                        "responsive" => [300 => ['items' =>  1],700 => ['items' =>  2], 1024 => ['items' => 3]],
                        "center" => false,
                        "stagePadding" => "0",],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Atributos Carousel"
                    ],
                ],
                "carouselItems" => [
                    "name" => "carouselItems",
                    "value" => [],
                    "type" => "json",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Atributos items Carousel"
                    ]
                ],
            ]
        ],
        "post" => [
            "title" => "Elementos extra del Post",
            "fields" => [
                "withSummary" => [
                    "name" => "withSummary",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar (Resumen)",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "summaryFontSize" => [
                    "name" => "summaryFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente (Resumen)",
                        "type" => "number"
                    ]
                ],
                "summaryAlign" => [
                    "name" => "summaryAlign",
                    "value" => "text-left",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación (Resumen)",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "summaryLetterSpacing" => [
                    "name" => "summaryLetterSpacing",
                    "type" => "input",
                    "props" => [
                        "label" => "Espacio entre letras (Resumen)",
                        "type" => "number"
                    ]
                ],
                "summaryColorByClass" => [
                    "name" => "summaryColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class (Resumen)",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "summaryColor" => [
                    "name" => "summaryColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom (Resumen)",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "summaryClass" => [
                    "name" => "summaryClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases (Resumen)",
                    ],
                ],
                "summaryStyle" => [
                    "name" => "summaryStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos (Resumen)",
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en el resumen",
                    ]
                ],
                "withCategory" => [
                    "name" => "withCategory",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar (Category)",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "categoryFontSize" => [
                    "name" => "categoryFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente (Category)",
                        "type" => "number"
                    ]
                ],
                "categoryAlign" => [
                    "name" => "categoryAlign",
                    "value" => "text-left",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación (Category)",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "categoryLetterSpacing" => [
                    "name" => "categoryLetterSpacing",
                    "type" => "input",
                    "props" => [
                        "label" => "Espacio entre letras (Category)",
                        "type" => "number"
                    ]
                ],
                "categoryColorByClass" => [
                    "name" => "categoryColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class (Category)",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "categoryColor" => [
                    "name" => "categoryColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom (Category)",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "categoryClass" => [
                    "name" => "categoryClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases (Category)",
                    ],
                ],
                "categoryStyle" => [
                    "name" => "categoryStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos (Category)",
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en el category",
                    ]
                ],
                "withDate" => [
                    "name" => "withDate",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar (Fecha)",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "dateFontSize" => [
                    "name" => "dateFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente (Fecha)",
                        "type" => "number"
                    ]
                ],
                "dateAlign" => [
                    "name" => "dateAlign",
                    "value" => "text-left",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación (Fecha)",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "formatCreatedDate" => [
                    "name" => "formatCreatedDate",
                    "type" => "select",
                    "props" => [
                        "label" => "Formato (Fecha)",
                        "options" => $vAttributes["formatCreatedDate"]
                    ]
                ],
                "dateColorByClass" => [
                    "name" => "dateColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class (Fecha)",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "dateColor" => [
                    "name" => "dateColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom (Fecha)",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "dateClass" => [
                    "name" => "dateClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases (Fecha)",
                    ],
                ],
                "dateStyle" => [
                    "name" => "dateStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos (Fecha)",
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en el fecha",
                    ]
                ],
                "withUser" => [
                    "name" => "withUser",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar (Usuario)",
                        "options" => [
                            ["label" => "Si", "value" => "1"],
                            ["label" => "Si (en la descripción)", "value" => "2"],
                            ["label" => "No", "value" => "3"],
                        ]
                    ]
                ],
                "userFontSize" => [
                    "name" => "userFontSize",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente (Usuario)",
                        "type" => "number"
                    ]
                ],
                "userAlign" => [
                    "name" => "userAlign",
                    "value" => "text-left",
                    "type" => "select",
                    "props" => [
                        "label" => "Alineación (Usuario)",
                        "options" => $vAttributes["textAlign"]
                    ]
                ],
                "userLetterSpacing" => [
                    "name" => "userLetterSpacing",
                    "type" => "input",
                    "props" => [
                        "label" => "Espacio entre letras (Usuario)",
                        "type" => "number"
                    ]
                ],
                "userColorByClass" => [
                    "name" => "userColorByClass",
                    "type" => "select",
                    "props" => [
                        "label" => "Color Class (Usuario)",
                        "options" => $vAttributes["textColors"]
                    ]
                ],
                "userColor" => [
                    "name" => "userColor",
                    "type" => "inputColor",
                    "props" => [
                        "label" => "Color Custom (Usuario)",
                    ],
                    "help" => [
                        "description" => "Selecciona el color Custom en Color Class para activarlo",
                    ]
                ],
                "userClass" => [
                    "name" => "userClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases (Usuario)",
                    ],
                ],
                "userStyle" => [
                    "name" => "userStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos (Usuario)",
                        'type' => 'textarea',
                        'rows' => 8,
                    ],
                    "help" => [
                        "description" => "Permite agregar estilos adicionales en el usuario",
                    ]
                ],

            ]
        ],
        "share" => [
            "title" => "Compartir",
            "fields" => [
                "withBody" => [
                    "name" => "withShare",
                    "value" => "1",
                    "type" => "select",
                    "props" => [
                        "label" => "Mostrar",
                        "options" => $vAttributes["validation"]
                    ]
                ],
                "shareFontClass" => [
                    "name" => "shareFontClass",
                    "type" => "input",
                    "props" => [
                        "label" => "Tamaño de fuente",
                        "type" => "number"
                    ]
                ],
                "shareClass" => [
                    "name" => "shareClass",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Clases",
                    ],
                ],
                "shareStyle" => [
                    "name" => "shareStyle",
                    "type" => "input",
                    "columns" => "col-12",
                    "props" => [
                        "label" => "Estilos",
                        'type' => 'textarea',
                        'rows' => 5,
                    ],
                ],
            ]
        ],
    ]
  ],
];
