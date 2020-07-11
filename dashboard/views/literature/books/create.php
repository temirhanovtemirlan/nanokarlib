<?php

/* @var $this yii\web\View */
/* @var $model common\models\literature\Book */

$this->title = Yii::t('app','Добавить новую книгу');
?>

<div class="publication-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
