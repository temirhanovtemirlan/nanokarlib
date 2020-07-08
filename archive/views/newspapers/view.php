<?php
/* @var $this yii\web\View */
/* @var $model common\models\literature\Newspaper */

$this->title = $model->title;
?>

<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $model->title ?></h3>
    </header>
    <div>
        <img src="<?= $model->image->source ?>">
    </div>
    <div>
        <?= $model->getAttribute('description_'.Yii::$app->language) ?>
    </div>
    <div>
        <span class="fa fa-star"><?= $model->rating ?></span>
        <span class="fa fa-eye"><?= count($model->views) ?></span>
        <span class="fa fa-star"><?= count($model->downloads) ?></span>
    </div>
    <div>
        <?php if ((\Yii::$app->user->isGuest && $model->readable) || !\Yii::$app->user->isGuest): ?>
            <a href="#"><?= Yii::t('app', 'Читать') ?></a>
        <?php endif; ?>
        <?php if ((\Yii::$app->user->isGuest && $model->downloadable) || !\Yii::$app->user->isGuest): ?>
            <a href="<?= \yii\helpers\Url::to(['/newspapers/download', 'id' => $model->id]) ?>"><?= Yii::t('app', 'Скачать газету') ?></a>
        <?php endif; ?>
    </div>
</section>
