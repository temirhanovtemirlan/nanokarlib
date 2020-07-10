<?php

/* @var $this yii\web\View */
/* @var $model common\models\Publication */
/* @var $categories array */

$this->title = Yii::t('app','Создать новую публикацию');
?>

<div class="publication-create">
    <?= $this->render('_form', ['model' => $model, 'categories' => $categories]) ?>
</div>
