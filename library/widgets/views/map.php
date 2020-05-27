<?php
/* @var string $latitude */
/* @var string $longitude */

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
                    'preset' => 'islands#governmentCircleIcon',
                    'iconColor' => '#3b5998'
                ],
            ]
        ],
    ],
    'mapOptions' => [
        'center' => [$latitude, $longitude],
        'zoom' => 10,
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