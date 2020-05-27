<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = Yii::t('app', 'Вопрос и ответ');
?>

<div class="question-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_view', ['model' => $model]) ?>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php $form::end() ?>
</div>
