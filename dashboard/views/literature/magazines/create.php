<?php

/* @var $this yii\web\View */
/* @var $model common\models\literature\Magazine */

$this->title = Yii::t('app','Добавить новый журнал');
?>

<div class="publication-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
