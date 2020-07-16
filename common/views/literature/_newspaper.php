<?php /* @var $model common\models\literature\Newspaper */ ?>
<div class="review-item d-flex px-4">
    <div class="img-responsive w-50">
        <img src="<?= $model->image->source ?>">
    </div>
    <div class="w-50">
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