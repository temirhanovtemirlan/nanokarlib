<?php
/* @var $this yii\web\View */
/* @var $model common\models\literature\Book */

$this->title = $model->title;
?>

<section class="main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $model->title ?></h3>
    </header>
    <div class="container content">
        <div class="ds-flex-align">
            <div class="img-responsive w-50">
                <img src="<?= $model->image->source ?>">
            </div>
            <div class="pl-3 w-50">
                <div class="lead">
                    <?= $model->author ?>
                </div>
                <?= $model->getAttribute('description_'.Yii::$app->language) ?>
                <div class="lead">
                    <span class="fa fa-star"><?= $model->rating ?></span>
                    <span class="fa fa-eye"><?= count($model->views) ?></span>
                    <span class="fa fa-download"><?= count($model->downloads) ?></span>
                </div>
                <?php if ($model->source && (\Yii::$app->user->isGuest && $model->readable) || !\Yii::$app->user->isGuest): ?>
                    <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/read', 'filename' => $model->source->source]) ?>"><?= Yii::t('app', 'Читать') ?></a>
                <?php endif; ?>
                <?php if ((\Yii::$app->user->isGuest && $model->downloadable) || !\Yii::$app->user->isGuest): ?>
                    <a download class="btn submit" href="<?= $model->source->source ?>"><?= Yii::t('app', 'Скачать книгу') ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

