<?php

/* @var $this yii\web\View */
/* @var $totalUsers string */
/* @var $authBlockBackground string */
/* @var $smartSpacesProvider common\filters\SmartSpaceFilter */
/* @var $questionsProvider common\filters\QuestionFilter */
/* @var $feedbackProvider common\filters\FeedbackFilter */
/* @var $smartSpacesMap string */
/* @var $settings array */
/* @var $additionalSections common\filters\CategoryFilter */
/* @var $renewalApplication common\models\RenewalApplication */

$this->title = $settings[\common\enums\SettingsEnum::LIBRARY_BRAND_LABEL];
?>

<?= $this->render('include/_authorization_block', [
    'totalUsers' => $totalUsers,
    'librarySpace' => $settings[\common\enums\SettingsEnum::LIBRARY_SPACE_INFO],
    'libraryFond' => $settings[\common\enums\SettingsEnum::LIBRARY_FOND_INFO],
    'background' => $authBlockBackground,
]) ?>
<main class="site_content">
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
        'longitude' => $settings[\common\enums\SettingsEnum::LIBRARY_MAP_LONGITUDE],
        'latitude' => $settings[\common\enums\SettingsEnum::LIBRARY_MAP_LATITUDE]
    ]) ?>
    <?= $this->render('include/_questions', [
        'dataProvider' => $questionsProvider,
    ]) ?>
    <?= $this->render('include/_feedback', [
        'dataProvider' => $feedbackProvider,
    ]) ?>
</main>
