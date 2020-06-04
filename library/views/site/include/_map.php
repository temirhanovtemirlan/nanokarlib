<?php
/* @var $latitude float */
/* @var $longitude float */
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
