<?php
/* @var $model common\models\Publication */

$this->title = $model->title;
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $model->title ?></h3>
    </header>
    <div class="container content">
        <p class="leading-text wow fadeIn p-4">
            <?= $model->body ?>
        </p>
        <?php if ($model->attachments): ?>
        <section class="main-video section_pd">
            <div class="video-wrap container">
                <div class="decor-lines left"></div>
                <div class="decor-lines right"></div>
                <div class="video-slide-wrapper">
                    <div class="video-slide slide">
                        <?php foreach ($model->attachments as $attachment): ?>
                            <?= $this->render($attachment->getRenderTemplate(), ['source' => $attachment->source]) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </div>
</section>