<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Публикации');
?>

<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Создать новую публикацию'), ['create'], ['class' => 'btn btn-primary'])?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->getAttribute('name_'.Yii::$app->language);
                },
            ],

            ['class' => 'common\components\ActionColumn']
        ]
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>
</div>
