<?php

/* @var $this yii\web\View */
/* @var $totalUsers string */
/* @var $authBlockBackground string */
/* @var $smartSpacesProvider common\filters\SmartSpaceFilter */
/* @var $questionsProvider common\filters\QuestionFilter */
/* @var $feedbackProvider common\filters\FeedbackFilter */
/* @var $smartSpacesMap string */
/* @var $settings array */
/* @var $mapSettings array */
/* @var $additionalSections common\filters\CategoryFilter */
/* @var $renewalApplication common\models\RenewalApplication */
/* @var $socialLinks common\models\Setting[] */

$this->title = $settings[\common\enums\SettingsEnum::LIBRARY_BRAND_LABEL];
?>

<?= $this->render('include/_authorization_block', [
    'totalUsers' => $totalUsers,
    'librarySpace' => $settings[\common\enums\SettingsEnum::LIBRARY_SPACE_INFO],
    'libraryFond' => $settings[\common\enums\SettingsEnum::LIBRARY_FOND_INFO],
    'background' => $authBlockBackground,
]) ?>
<?= $this->render('include/_slider') ?>
<?= $this->render('include/_smart_spaces', [
    'dataProvider' => $smartSpacesProvider,
    'map' => $smartSpacesMap,
]) ?>
<?= $this->render('include/_additional_sections', [
    'dataProvider' => $additionalSections,
]) ?>
<?= $this->render('include/_renewal_application', [
    'model' => $renewalApplication,
]) ?>
<?= $this->render('include/_map', [
    'longitude' => $mapSettings[\common\enums\SettingsEnum::LIBRARY_MAP_LONGITUDE],
    'latitude' => $mapSettings[\common\enums\SettingsEnum::LIBRARY_MAP_LATITUDE],
    'address' => $mapSettings[\common\enums\SettingsEnum::LIBRARY_CONTACTS_ADDRESS],
    'phone' => $mapSettings[\common\enums\SettingsEnum::LIBRARY_CONTACTS_PHONE],
    'email' => $mapSettings[\common\enums\SettingsEnum::LIBRARY_CONTACTS_EMAIL]
]) ?>
<?= $this->render('include/_questions', [
    'dataProvider' => $questionsProvider,
]) ?>
<?= $this->render('include/_feedback', [
    'dataProvider' => $feedbackProvider,
    'socialLinks' => $socialLinks,
]) ?>