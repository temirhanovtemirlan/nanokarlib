<?php

/* @var $dataProvider common\filters\AttachmentFilter */
/* @var $models common\models\Attachment[] */
$models = $dataProvider->getModels();
?>
<section class="main-video section_pd">
    <div class="video-wrap container">
        <div class="decor-lines left"></div>
        <div class="decor-lines right"></div>
        <div class="video-slide-wrapper">
            <div class="video-slide slide">
                <?php foreach ($models as $model): ?>
                    <?= $this->render($model->getRenderTemplate(), ['source' => $model->source]) ?>
                <?php endforeach; ?>
                <div class="video-item">
                    <video class="with-video" src="#" poster="/images/video-slide.png"></video>
                </div>
                <div class="video-item">
                    <video class="with-video" src="#" poster="/images/video-slide.png"></video>
                </div>
            </div>
        </div>
    </div>
</section>