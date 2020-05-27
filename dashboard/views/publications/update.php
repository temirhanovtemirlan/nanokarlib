<?php

/* @var $this yii\web\View */
/* @var $model common\models\Publication */
/* @var $categories array */

$this->title = Yii::t('app','Редактировать публикацию');
?>

<div class="publication-create">
    <h1><?= \yii\bootstrap4\Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'categories' => $categories]) ?>
</div>
