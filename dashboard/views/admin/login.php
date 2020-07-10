<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model common\forms\LoginForm */

use dashboard\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= \Yii::t('app', 'Войти'); ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="hold-transition login-page">
    <div class="login-box dashboard-style">
        <div class="login-logo">
            <a href="javascript:void(0)"><b><?= \Yii::t('app', 'Админ панель') ?></b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <h1><?= Html::encode($this->title) ?></h1>
                <p class="login-box-msg"><?= \Yii::t('app', 'Пожалуйста, заполните следующие поля для входа:') ?></p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="row">
                        <div class="col-8">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                        <div class="col-4">
                            <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
