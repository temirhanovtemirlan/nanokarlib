<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('app', 'Раздел') . ': ' . $model->getAttribute('name_'.Yii::$app->language);
?>

<div class="users-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data-confirm' => \Yii::t('yii', 'Вы уверены, что хотите удалить эту запись?'),
            'data-method' => 'post'])
        ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description_ru',
            'description_kk',
            'description_en',
            'name_ru',
            'name_kk',
            'name_en',
            'url_ru',
            'url_kk',
            'url_en',
            [
                'attribute' => 'parent_id',
                'value' => $model->getParent(),
            ],
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ]
        ],
    ]) ?>

</div>
