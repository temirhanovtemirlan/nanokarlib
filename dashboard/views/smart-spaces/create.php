<?php

/* @var $this yii\web\View */
/* @var $model common\models\SmartSpace */
/* @var $categories array */

$this->title = Yii::t('app','Добавить новое пространство');
?>

<div class="publication-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
