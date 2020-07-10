<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use library\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= \library\widgets\Navigation::widget() ?>
<?= Alert::widget() ?>
<main class="site_content">
    <?= $content ?>
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
                    <a href="#"><?= Yii::t('app', 'Электронный архив') ?></a>
                </li>
                <li>
                    <a href="#"><?= Yii::t('app', 'Версия для слабовидящих') ?></a>
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
