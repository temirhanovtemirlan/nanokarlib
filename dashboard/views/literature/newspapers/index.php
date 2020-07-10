<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filterModel dashboard\filters\literature\MagazinesFilter */

$this->title = Yii::t('app', 'Газеты');
?>

<div class="category-index">
    <p>
        <?= Html::a(Yii::t('app', 'Добавить новую газету'), ['create'], ['class' => 'btn btn-primary'])?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $filterModel,
        'summary' => false,
        'columns' => [
            'id',
            'title',

            ['class' => 'common\components\ActionColumn']
        ]
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>
</div>
