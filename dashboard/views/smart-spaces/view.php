<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SmartSpace */

$this->title = Yii::t('app', 'Smart-пространство') . ': ' . $model->getAttribute('name_'.Yii::$app->language);
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
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ]
        ],
    ]) ?>

</div>
