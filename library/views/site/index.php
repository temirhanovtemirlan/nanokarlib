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

use yii\helpers\Html;
use library\assets\AppAsset;

AppAsset::register($this);
$this->title = strip_tags($settings[\common\enums\SettingsEnum::LIBRARY_BRAND_LABEL]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= \common\widgets\HtmlLang::widget() ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<main class="site_content">
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
</main>

<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <a class="v_mobile ds-flex" href="/"><img class="switching-btn" alt="#" src="<?= Yii::$app->attachmentService->getLibraryLogo() ?>"></a>
            <ul class="footer-menu site-menu">
                <li>
                    <a href="/"><?= Yii::t('app', 'Главная') ?></a>
                </li>
                <li>
                    <a href="<?= Yii::$app->params['archiveUrl'] ?>"><?= Yii::t('app', 'Электронный архив') ?></a>
                </li>
                <li>
                    <a href="#"><?= Yii::t('app', 'Версия для слабовидящих') ?></a>
                </li>
                <li>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <a href="<?= \yii\helpers\Url::to('/auth') ?>">
                            <?= Yii::t('app', 'Авторизация') ?>
                        </a>
                    <?php else: ?>
                        <?= \yii\bootstrap4\Html::a(Yii::t('app', 'Выход'), ['/logout'], ['data-method' => 'post']) ?>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <a class="scroll-top ds-flex" href="javascript:scroll(0,0)">
            <div class="line-red left"></div>
            <div class="line-red right"></div>
            <svg class="bi bi-chevron-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
            </svg>
        </a>
    </div>
</footer>

<div id="cube-loader">
    <div class="caption">
        <div class="cube-loader">
            <div class="cube loader-1"></div>
            <div class="cube loader-2"></div>
            <div class="cube loader-4"></div>
            <div class="cube loader-3"></div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>