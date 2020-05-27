<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $login common\forms\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Войти');
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Введите данные, чтобы войти:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($login, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($login, 'password')->passwordInput() ?>

                <?= $form->field($login, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <?= Html::a(Yii::t('app', 'Регистрация'), [\yii\helpers\Url::to(['/site/registration'])], ['class' => 'btn btn-success'])?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
