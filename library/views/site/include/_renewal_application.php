<?php
use yii\bootstrap4\ActiveForm;

/* @var $model common\models\RenewalApplication */
$disabled = Yii::$app->user->isGuest;
?>

<section class="book-renewal section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Продление сроков чтения книг') ?></h3>
    </header>
    <div class="container">
        <?php $form = ActiveForm::begin([
            'action' => '/site/send-renewal-application',
            'method' => 'post',
            'enableAjaxValidation' => true,
            'options' => [
                'class' => 'renewal-form',
            ]
        ]) ?>
        <div class="form-content">
            <?php if (Yii::$app->user->isGuest): ?>
                <p><a href="<?= \yii\helpers\Url::to(['/site/auth']) ?>"><?= Yii::t('app', 'Авторизуйтесь, чтобы отправить заявку') ?></a></p>
            <?php endif; ?>
            <div class="form-data">
                <div class="input-wrap">
                    <?= $form->field($model, 'full_name')->textInput(['class' => 'input form-input', 'disabled' => $disabled]) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'card_number')->textInput(['class' => 'input form-input', 'disabled' => $disabled]) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'book_name')->textInput(['class' => 'input form-input', 'disabled' => $disabled]) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'email')->textInput(['class' => 'input form-input', 'disabled' => $disabled, 'type' => 'email']) ?>
                </div>
            </div>
            <div class="form-btn justify-content-end">
                <button <?= Yii::$app->user->isGuest ? 'disabled' : '' ?> class="btn submit" type="submit">
                    <?= Yii::t('app', 'Отправить')?>
                </button>
            </div>
        </div>
        <?php $form::end() ?>
    </div>
</section>
