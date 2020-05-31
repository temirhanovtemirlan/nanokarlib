<?php
/* @var $latitude float */
/* @var $longitude float */

echo \phpnt\yandexMap\YandexMaps::widget([
    'myPlacemarks' => [
        [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'options' => [
                [
                    'hintContent' => 'Подсказка при наведении на маркет',
                    'balloonContentHeader' => 'Заголовок после нажатия на маркер',
                    'balloonContentBody' => 'Контент после нажатия на маркер',
                    'balloonContentFooter' => 'Футер после нажатия на маркер',
                ],
                [
                    'preset' => 'islands#icon',
                    'iconColor' => '#19a111'
                ]
            ]
        ]
    ],
    'mapOptions' => [
        'center' => [52, 59],
        'zoom' => 3,
        'controls' => ['zoomControl',  'fullscreenControl', 'searchControl'],
        'control' => [
            'zoomControl' => [
                'top' => 75,
                'left' => 5
            ],
        ],
    ],
    'disableScroll' => true,
    'windowWidth' => '100%',
    'windowHeight' => '400px',
]);