<?php
/* @var $dataProvider common\filters\SmartSpaceFilter */
/* @var $map string */
/* @var $models common\models\SmartSpace[] */
$models = $dataProvider->getModels();
?>
<section class="smart-spaces section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Smart-пространства') ?></h3>
    </header>
    <div class="container">
        <div class="<?= (!$models) ? '' : 'spaces-wrap' ?>">
            <div class="direction-reveal direction-reveal--grid-bootstrap direction-reveal--demo-bootstrap">
                <div class="spaces-list section-list_pd direction-reveal">
                    <?php if ($models): ?>
                        <?php foreach ($models as $model): ?>
                            <div class="col-spaces">
                                <div class="spaces-item direction-reveal__card swing--out-left" style="background-image: url('<?= $model->attachment->source ?>')">
                                    <div class="direction-reveal__overlay-head spaces-block">
                                        <h5 class="direction-reveal__title-head">
                                            <?= $model->getAttribute('name_' . Yii::$app->language) ?>
                                        </h5>
                                    </div>
                                    <div class="direction-reveal__overlay">
                                        <h5 class="direction-reveal__title"><?= $model->getAttribute('name_' . Yii::$app->language) ?></h5>
                                        <p class="direction-reveal__text">
                                            <?= $model->getAttribute('description_' . Yii::$app->language) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="section_pd">
            <div class="video-wrap plan-wrap mt-4">
                <div class="decor-lines left"></div>
                <div class="decor-lines right"></div>
                <div class="decor-wrap"><img alt="#" src="<?= $map ?>"></div>
            </div>
        </div>
    </div>
</section>