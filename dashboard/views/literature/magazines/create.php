<?php

/* @var $this yii\web\View */
/* @var $model common\models\literature\Magazine */

$this->title = Yii::t('app','Добавить новый журнал');
?>

<div class="publication-create">
    <h1><?= \yii\bootstrap4\Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
