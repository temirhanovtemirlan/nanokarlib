<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\literature\Magazine */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $categories array */
?>

<div class="publication-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'canonical_title')->textInput() ?>

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
            </div>
        </div>
    </div>

    <?= $form->field($model, 'publish_date')->textInput(['type' => 'date', 'value' => $model->publish_date ? $model->getPublishDateForInput() : '']) ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <?= $form->field($model, 'readable')->checkbox() ?>

    <?= $form->field($model, 'downloadable')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>
    <?php $form::end() ?>
</div>
