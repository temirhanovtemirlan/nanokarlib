<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Publication */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $categories array */
?>

<div class="publication-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'language')->dropdownList(\common\enums\LanguagesEnum::labels()) ?>

    <?= $form->field($model, 'category_id')->dropdownList($categories) ?>

    <?= $form->field($model, 'announce')->textarea() ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'canonical_title')->textInput() ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>
    <?php $form::end() ?>
</div>
