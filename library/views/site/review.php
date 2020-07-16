<?php
use yii\bootstrap4\ActiveForm;
/* @var $model common\models\Question */

$this->title = Yii::t('app', 'Оставить отзыв');
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Оставить отзыв') ?></h3>
    </header>
    <div class="container content">
        <?php $form = ActiveForm::begin([
            'action' => '/site/review',
            'method' => 'post',
            'options' => [
                'class' => 'renewal-form'
            ]
        ]) ?>

        <div class="form-content">
            <div class="form-data">
                <div class="input-wrap">
                    <?= $form->field($model, 'full_name')->textInput(['class' => 'input form-input']) ?>
                </div>
                <div class="input-wrap">
                    <?= $form->field($model, 'message')->textarea(['class' => 'input form-input', 'style' => 'height:140px;resize:none']) ?>
                </div>
            </div>
            <div class="form-btn justify-content-end">
                <button class="btn submit" type="submit">
                    <?= Yii::t('app', 'Отправить')?>
                </button>
            </div>
        </div>
        <?php $form::end() ?>
    </div>
</section>
