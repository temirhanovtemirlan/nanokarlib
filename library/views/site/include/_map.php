<?php
/* @var $latitude float */
/* @var $longitude float */
/* @var $address string */
/* @var $phone string */
/* @var $email string */
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
$js = "
    function maps(){
        var myMap = new ymaps.Map(\"map\", {
            center: ['{$latitude}', '{$longitude}'],
            zoom: 17
        });

        var placemark = new ymaps.Placemark(['{$latitude}', '{$longitude}'], {
            balloonContent: '<div class=\"ballon\"><div class=\"logo\"></div><div class=\"ball-00\">{$address}<br>{$phone}<br>{$email}</div></div>',
            iconImageHref: '/images/map-label.png',
            iconImageSize: [64, 64],
            iconImageOffset: [-32, -64],
            balloonContentSize: [320, 120],
            balloonLayout: \"default#imageWithContent\",
            balloonImageHref: '/images/map-label.png',
            balloonImageOffset: [-65, -89],
            balloonImageSize: [310, 110],
            balloonShadow: false,
            balloonAutoPan: false
        });
        

        myMap.geoObjects.add(placemark);
        placemark.balloon.open();
    }
    ymaps.ready(maps);
";

$this->registerJs($js);
?>