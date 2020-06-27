<?php
use yii\bootstrap4\ActiveForm;
/* @var $model common\forms\RegistrationForm */

$this->title = Yii::t('app', 'Регистрация');
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Регистрация') ?></h3>
    </header>
    <div class="container content">
        <?php $form = ActiveForm::begin([
            'action' => '/site/registration',
            'method' => 'post',
            'options' => [
                'class' => 'renewal-form'
            ]
        ]) ?>

        <div class="form-content">
            <div class="form-data">
                <div class="input-wrap">
                    <?= $form->field($model, 'username')->textInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email','class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'password')->passwordInput(['class' => 'input form-input']) ?>
                </div>
            </div>
            <div class="form-btn justify-content-end">
                <button class="btn submit" type="submit">
                    <?= Yii::t('app', 'Подтвердить')?>
                </button>
            </div>
        </div>
        <?php $form::end() ?>
    </div>
</section>
