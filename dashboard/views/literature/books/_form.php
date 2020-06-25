<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\literature\Book */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $categories array */
?>

<div class="publication-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'canonical_title')->textInput() ?>

    <?= $form->field($model, 'description_ru')->widget(\mihaildev\ckeditor\CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standard',
            'inline' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'description_kk')->widget(\mihaildev\ckeditor\CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standard',
            'inline' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <?= $form->field($model, 'recommended')->checkbox() ?>

    <?= $form->field($model, 'latest')->checkbox() ?>

    <?= $form->field($model, 'readable')->checkbox() ?>

    <?= $form->field($model, 'downloadable')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>
    <?php $form::end() ?>
</div>
