<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filterModel common\models\Question */

$this->title = Yii::t('app', 'Вопросы и ответы');
?>

<div class="question-index">
    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            'id',
            'text',
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
