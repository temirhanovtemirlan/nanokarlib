<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $child bool */

$this->title = Yii::t('app', 'Создать новый раздел');
?>

<div class="category-create">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'type')->dropdownList(\common\enums\CategoriesEnum::labels()) ?>

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

    <?= $form->field($model, 'description_en')->widget(\mihaildev\ckeditor\CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standard',
            'inline' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'name_ru')->textInput() ?>

    <?= $form->field($model, 'name_kk')->textInput() ?>

    <?= $form->field($model, 'name_en')->textInput() ?>

    <?= $form->field($model, 'url_ru')->textInput() ?>

    <?= $form->field($model, 'url_kk')->textInput() ?>

    <?= $form->field($model, 'url_en')->textInput() ?>

    <?php if ($child): ?>
        <?= $form->field($model, 'parent_id')->dropdownList(\yii\helpers\ArrayHelper::map($dataProvider->getModels(), 'id', 'name_'.Yii::$app->language)) ?>
    <?php endif; ?>
    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php $form::end() ?>
</div>
