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

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'type')->dropdownList(\common\enums\CategoriesEnum::labels()) ?>

<div class="card">
    <div class="card-header d-flex p-0">
        <ul class="nav nav-pills p-2">
            <li class="nav-item">
                <a class="nav-link active" href="#tab_<?= \common\enums\LanguagesEnum::label('ru') . '_1' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('ru') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_<?= \common\enums\LanguagesEnum::label('kk') . '_1' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('kk') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_<?= \common\enums\LanguagesEnum::label('en')  . '_1' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('en') ?></a>
            </li>
        </ul>
    </div>
    <div class="card-body" style="padding: .8rem;">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_<?= \common\enums\LanguagesEnum::label('ru') . '_1' ?>">
                <?= $form->field($model, 'description_ru')->widget(\mihaildev\ckeditor\CKEditor::class, [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('kk')  . '_1' ?>">
                <?= $form->field($model, 'description_kk')->widget(\mihaildev\ckeditor\CKEditor::class, [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('en')  . '_1' ?>">
                <?= $form->field($model, 'description_en')->widget(\mihaildev\ckeditor\CKEditor::class, [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex p-0">
        <ul class="nav nav-pills p-2">
            <li class="nav-item">
                <a class="nav-link active" href="#tab_<?= \common\enums\LanguagesEnum::label('ru') . '_2' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('ru') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_<?= \common\enums\LanguagesEnum::label('kk') . '_2' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('kk') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_<?= \common\enums\LanguagesEnum::label('en')  . '_2' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('en') ?></a>
            </li>
        </ul>
    </div>
    <div class="card-body" style="padding: .8rem;">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_<?= \common\enums\LanguagesEnum::label('ru') . '_2' ?>">
                <?= $form->field($model, 'name_ru')->textInput() ?>
            </div>
            <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('kk')  . '_2' ?>">
                <?= $form->field($model, 'name_kk')->textInput() ?>
            </div>
            <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('en')  . '_2' ?>">
                <?= $form->field($model, 'name_en')->textInput() ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex p-0">
        <ul class="nav nav-pills p-2">
            <li class="nav-item">
                <a class="nav-link active" href="#tab_<?= \common\enums\LanguagesEnum::label('ru') . '_3' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('ru') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_<?= \common\enums\LanguagesEnum::label('kk') . '_3' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('kk') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_<?= \common\enums\LanguagesEnum::label('en')  . '_3' ?>"
                   data-toggle="tab"><?= \common\enums\LanguagesEnum::label('en') ?></a>
            </li>
        </ul>
    </div>
    <div class="card-body" style="padding: .8rem;">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_<?= \common\enums\LanguagesEnum::label('ru') . '_3' ?>">
                <?= $form->field($model, 'url_ru')->textInput() ?>
            </div>
            <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('kk')  . '_3' ?>">
                <?= $form->field($model, 'url_kk')->textInput() ?>
            </div>
            <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('en')  . '_3' ?>">
                <?= $form->field($model, 'url_en')->textInput() ?>
            </div>
        </div>
    </div>
</div>

<?php if ($child): ?>
    <?= $form->field($model, 'parent_id')->dropdownList(\yii\helpers\ArrayHelper::map($dataProvider->getModels(), 'id', 'name_' . Yii::$app->language)) ?>
<?php endif; ?>
<?= $form->field($model, 'published')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
</div>

<?php $form::end() ?>
