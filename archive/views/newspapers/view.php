<?php
/* @var $this yii\web\View */
/* @var $model common\models\literature\Newspaper */

$this->title = $model->title;
?>

<section class="main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $model->title ?></h3>
    </header>
    <div class="img-responsive w-50">
        <img src="<?= $model->image->source ?>">
    </div>
    <div class="w-50">

        <div>
            <?= $model->getAttribute('description_'.Yii::$app->language) ?>
        </div>
        <div>
            <span class="fa fa-star"><?= $model->rating ?></span>
            <span class="fa fa-eye"><?= count($model->views) ?></span>
            <span class="fa fa-download"><?= count($model->downloads) ?></span>
        </div>
        <?php if ($model->source && (\Yii::$app->user->isGuest && $model->readable) || !\Yii::$app->user->isGuest): ?>
            <a data-toggle="modal" data-target="#reader" class="btn submit" href="#"><?= Yii::t('app', 'Читать') ?></a>
        <?php endif; ?>
        <?php if ((\Yii::$app->user->isGuest && $model->downloadable) || !\Yii::$app->user->isGuest): ?>
            <a class="btn submit" href="<?= \yii\helpers\Url::to(['/newspapers/download', 'id' => $model->id]) ?>"><?= Yii::t('app', 'Скачать газету') ?></a>
        <?php endif; ?>
    </div>
</section>

<?php \yii\bootstrap4\Modal::begin([
    'id' => 'reader',
    'title' => $model->title
]) ?>
    <div class="sample-container">
        <div class="flip-book-container" src="<?= $model->source->source ?>"></div>
    </div>
<?php \yii\bootstrap4\Modal::end() ?>
