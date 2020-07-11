<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SmartSpace */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin() ?>

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
                    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>
                </div>
                <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('kk')  . '_1' ?>">
                    <?= $form->field($model, 'description_kk')->textarea(['rows' => 6]) ?>
                </div>
                <div class="tab-pane" id="tab_<?= \common\enums\LanguagesEnum::label('en')  . '_1' ?>">
                    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>
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

    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php $form::end() ?>
</div>
