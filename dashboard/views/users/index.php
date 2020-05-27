<?php
use yii\bootstrap4\Html;

/* @var $dataProvider yii\data\ActiveDataProvider*/
/* @var $filterModel common\filters\UsersFilter*/
/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Пользователи');
?>

<div class="users-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать нового администратора'), ['new-admin'], ['class' => 'btn btn-primary'])?>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $filterModel,
        'summary' => false,
        'columns' => [
            'id',
            'username',
            'email',

            ['class' => 'common\components\ActionColumn', 'template' => '{view}']
        ]
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>
</div>
