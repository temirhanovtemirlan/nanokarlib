<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SmartSpace */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_kk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_ru')->textInput() ?>

    <?= $form->field($model, 'name_kk')->textInput() ?>

    <?= $form->field($model, 'name_en')->textInput() ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php $form::end() ?>
</div>
