<?php
/* @var $model common\models\literature\Book */
?>
<div class="review-item d-flex">
    <div class="img-responsive">
        <img src="<?= $model->image->source ?>">
    </div>
    <div>
        <div class="text"><?= $model->title ?></div>
        <p>
            <span class="author"><?= $model->author ?></span>
        </p>
        <p class="lead">
            <?= $model->getAttribute('description_'.Yii::$app->language) ?>
        </p>
        <p><i class="fa fa-star text-secondary"></i>
            <?= Yii::t('app', 'Рейтинг: {count}', ['count' => $model->rating]) ?>
        </p>
        <p><i class="fa fa-eye text-secondary"></i>
            <?= Yii::t('app', 'Просмотров: {count}', ['count' => count($model->views)]) ?>
        </p>
        <p><i class="fa fa-download text-secondary"></i>
            <?= Yii::t('app', 'Загрузок: {count}', ['count' => count($model->downloads)]) ?>
        </p>
        <p>
            <a href="<?= \yii\helpers\Url::to(['/books/view', 'canonical_title' => $model->canonical_title]) ?>" class="btn submit"><?= Yii::t('app', 'Подробнее') ?></a>
        </p>
    </div>
</div>