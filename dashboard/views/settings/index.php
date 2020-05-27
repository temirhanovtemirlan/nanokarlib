<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider common\filters\SettingFilter */
/* @var $models common\models\Setting[]*/

$this->title = Yii::t('app', 'Настройки');
$models = $dataProvider->getModels();
?>

<div class="settings-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach ($models as $setting): ?>
    <div>
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'action' => ['/settings/save', 'id' => $setting->id],
        ]) ?>
        <?= $form->field($setting, 'content')->textInput()->label(\common\enums\SettingsEnum::label($setting->type) . "($setting->language)") ?>
        <?php $form::end(); ?>
    </div>
    <?php endforeach; ?>
</div>
