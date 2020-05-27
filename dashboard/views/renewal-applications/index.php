<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filterModel common\models\RenewalApplication */

$this->title = Yii::t('app', 'Заявки на продление книг');
?>

<div class="question-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $filterModel,
        'summary' => false,
        'columns' => [
            'id',
            'full_name',
            'card_number',
            'book_name',
            'email',

            ['class' => 'common\components\ActionColumn', 'template' => '{delete}']
        ]
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>
</div>
