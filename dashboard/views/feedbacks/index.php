<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Отзывы');
?>

<div class="question-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            'id',
            'full_name',
            'message',
            [
                'attribute' => 'published',
                'value' => function ($model) { return \common\enums\PublishedEnum::label($model->published); },
                'filter' => \common\enums\PublishedEnum::labels(),
            ],

            ['class' => 'common\components\ActionColumn', 'template' => '{view} {delete}']
        ]
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>
</div>
