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
            <div class="spaces-list section-list_pd">
                <?php if ($models): ?>
                    <?php foreach ($models as $model): ?>
                        <div class="col-spaces">
                            <div class="spaces-item">
                                <div class="spaces-block">
                                    <?= $model->getAttribute('description_' . Yii::$app->language) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="video-wrap plan-wrap">
            <div class="decor-lines left"></div>
            <div class="decor-lines right"></div>
            <div class="decor-wrap"><img alt="#" src="<?= $map ?>"></div>
        </div>
    </div>
</section>