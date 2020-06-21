<?php

/* @var $this yii\web\View */
/* @var $model common\models\literature\Book */

$this->title = Yii::t('app','Добавить новую книгу');
?>

<div class="publication-create">
    <h1><?= \yii\bootstrap4\Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
