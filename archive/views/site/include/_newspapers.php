<?php
/* @var $models common\models\literature\Newspaper[] */
/* @var $provider yii\data\ActiveDataProvider */

$models = $provider->getModels();
?>

<section class="section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Газеты') ?></h3>
    </header>
    <div class="container">
        <div class="section-list_pd">
            <div class="review-slide slide">
                <?php if ($models): ?>
                    <?php foreach ($models as $model): ?>
                        <div class="review-item d-flex">
                            <div class="img-responsive">
                                <img src="<?= $model->image->source ?>">
                            </div>
                            <div>
                                <div class="text"><?= $model->title ?></div>
                                <p>
                                    <span class="author"><?= $model->publish_date ?></span>
                                </p>
                                <p><i class="fa fa-eye text-secondary"></i>
                                    <?= Yii::t('app', 'Прочитали: {count}', ['count' => count($model->views)]) ?>
                                </p>
                                <p>
                                    <a href="<?= \yii\helpers\Url::to(['/magazines/view', 'canonical_title' => $model->canonical_title]) ?>" class="btn submit"><?= Yii::t('app', 'Подробнее') ?></a>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-btn justify-content-center">
            <a class="btn submit" href="<?= \yii\helpers\Url::to(['/magazines/index']) ?>">
                <?= Yii::t('app', 'Все журналы') ?>
            </a>
        </div>
    </div>
</section>