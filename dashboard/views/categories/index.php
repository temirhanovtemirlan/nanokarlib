<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $dataProvider common\filters\CategoryFilter */
/* @var $filterModel common\models\Category */

$this->title = Yii::t('app', 'Категории');
?>

<p>
    <?= Html::a(Yii::t('app', 'Создать новый раздел'), ['create'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Создать новый подраздел'), ['create?child=1'], ['class' => 'btn btn-primary']) ?>
</p>

<?php \yii\widgets\Pjax::begin(); ?>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'columns' => [
        'id',
        'name_ru',
        'name_kk',
        'name_en',

        ['class' => 'common\components\ActionColumn']
    ]
]); ?>

<?php \yii\widgets\Pjax::end(); ?>