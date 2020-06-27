<?php

/* @var $this yii\web\View */
/* @var $authBlock array */
/* @var $authBlockBackground string */
/* @var $booksProvider yii\data\ActiveDataProvider */
/* @var $newspapersProvider yii\data\ActiveDataProvider */
/* @var $magazinesProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Электронный архив');
?>
<?= $this->render('include/_authorization_block', [
    'libraryFond' => $authBlock[\common\enums\SettingsEnum::LIBRARY_FOND_INFO],
    'librarySpace' => $authBlock[\common\enums\SettingsEnum::LIBRARY_SPACE_INFO],
    'background' => $authBlockBackground,
]) ?>
<?= \common\widgets\Slider::widget(); ?>
<?= $this->render('include/_books', [
    'provider' => $booksProvider
]) ?>
<?= $this->render('include/_newspapers', [
    'provider' => $newspapersProvider
]) ?>
<?= $this->render('include/_magazines', [
    'provider' => $magazinesProvider
]) ?>
