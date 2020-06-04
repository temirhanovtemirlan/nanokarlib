<?php
use yii\bootstrap4\ActiveForm;
/* @var $model common\models\RenewalApplication */

?>
<section class="book-renewal section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Продление сроков чтения книг') ?></h3>
    </header>
    <div class="container">
        <?php $form = ActiveForm::begin([
            'action' => 'site/send-renewal-application',
            'method' => 'post',
            'options' => [
                'class' => 'renewal-form',
            ],
        ]) ?>
        <div class="form-content">
            <?php if (Yii::$app->user->isGuest): ?>
                <p><?= Yii::t('app', 'Авторизуйтесь, чтобы отправить заявку') ?></p>
            <?php endif; ?>
            <div class="form-data">
                <div class="input-wrap">
                    <?= $form->field($model, 'full_name')->textInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'card_number')->textInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'book_name')->textInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email', 'class' => 'input form-input']) ?>
                </div>
            </div>
            <div class="form-btn justify-content-end">
                <button class="btn submit" type="submit"><?= Yii::t('app', 'Отправить')?></button>
            </div>
        </div>
        <?php $form::end() ?>
    </div>
</section>
