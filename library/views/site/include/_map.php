<?php
/* @var $latitude float */
/* @var $longitude float */
/* @var $this yii\web\View */
?>
<section class="maps section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Карта проезда и адресные данные') ?></h3>
    </header>
    <div class="video-wrap container">
        <div class="decor-lines left"></div>
        <div class="decor-lines right"></div>
        <div class="section-list_pd">
            <div class="maps-wrap decor-wrap">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>

<?php
$js = <<< JS
function maps(){
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчнию: «широта, долгота».
            center: [49.815983, 73.099758],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 17
        });

        var placemark = new ymaps.Placemark([49.815983, 73.099758], {
            balloonContent: '<div class="ballon"><div class="logo"></div><div class="ball-00">Гоголя, 34 көшесі <br>+7 (7212) 56-70-84 <br>langcenterkar@mail.ru</div></div>',
            iconImageHref: '../images/map-label.png',
            iconImageSize: [64, 64],
            iconImageOffset: [-32, -64],
            balloonContentSize: [320, 120],
            balloonLayout: "default#imageWithContent",
            balloonImageHref: '/images/map-label.png',
            balloonImageOffset: [-65, -89],
            balloonImageSize: [310, 110],
            balloonShadow: false,
            balloonAutoPan: false
        });

        myMap.geoObjects.add(placemark);
    }
ymaps.ready(maps);
JS;

$this->registerJs($js);
?>