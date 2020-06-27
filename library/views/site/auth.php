<?php

use yii\bootstrap4\ActiveForm;

/* @var $model common\forms\LoginForm */

$this->title = Yii::t('app', 'Авторизация');
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Авторизация') ?></h3>
    </header>
    <div class="container content">
        <?php $form = ActiveForm::begin([
            'action' => '/site/auth',
            'method' => 'post',
            'options' => [
                'class' => 'renewal-form'
            ]
        ]) ?>

        <div class="form-content no_pd">
            <div class="form-data">
                <div class="input-wrap">
                    <?= $form->field($model, 'username')->textInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'password')->passwordInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
            </div>
            <div class="main-filter row">
                <div class="col-md-9">
                    <input type="text" placeholder="Поиск" class="input form-input" name="search" />
                </div>
                <div class="col-md-3">
                    <select name="filter_name" class="select form-input">
                        <option value="0">456</option>
                        <option value="1">123</option>
                        <option value="2">fgh</option>
                    </select>
                </div>
            </div>
            <div class="form-btn justify-content-end">
                <button class="btn submit" type="submit">
                    <?= Yii::t('app', 'Войти') ?>
                </button>
                <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/registration']) ?>">
                    <?= Yii::t('app', 'Регистрация') ?>
                </a>
            </div>
        </div>

        <?php $form::end() ?>
    </div>
</section>
