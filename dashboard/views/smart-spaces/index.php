<?php
use yii\bootstrap4\Html;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filterModel common\filters\SmartSpaceFilter */
/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Smart-пространства');
?>

<div class="smart-spaces-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить новое пространство'), ['create'], ['class' => 'btn btn-primary'])?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $filterModel,
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
</div>
