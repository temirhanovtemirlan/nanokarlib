<?php

use yii\helpers\Url;

/* @var $logo string */
/* @var $brandLabel string */
/* @var $menuItems common\models\Category[] */
/* @var $socialLinks common\models\Setting[] */
?>
<header class="site-header header-pd">
    <div class="header-top">
        <div class="hamburger-menu">
            <button class="menu__btn btn"><span></span></button>
            <ul class="dropdown-catalog-list">
                <?php foreach ($menuItems as $item): ?>
                    <li class="dropdown-catalog-item">
                        <a href="<?= Url::to(['/site/section', 'url' => $item->getAttribute('url_' . Yii::$app->language)]) ?>">
                            <?= $item->getAttribute('name_' . Yii::$app->language) ?>
                        </a>
                    </li>
                    <?php if ($item->children): ?>
                        <div class="dropdown-cat">
                            <ul class="dropdown-cat-list">
                                <?php foreach ($item->children as $child): ?>
                                    <li class="dropdown-cat-item">
                                        <a class="parent"
                                           href="<?= Url::to(['/site/section', 'url' => $child->getAttribute('url_' . Yii::$app->language)]) ?>">
                                            <?= $child->getAttribute('name_' . Yii::$app->language) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="site-logo wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s"><a class="logotype ds-flex"
                                                                                            href="/"><img
                        src="<?= $logo ?>"></a>
            <h1 class="text-img"><?= $brandLabel ?></h1>
        </div>
        <div class="top-right">
            <div class="dropdown language-menu">
                <a class="ds-center current-lang lang-link" href="<?= Url::current() ?>" data-toggle="dropdown">
                    <?= \common\enums\LanguagesEnum::label(Yii::$app->language) ?>
                    <i class="icons-small arrow-down">
                        <svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14 1.52125L12.6503 -7.61229e-08L7 4.42233L1.34975 -5.89994e-08L-2.39484e-07 1.52125L7 7L14 1.52125Z" fill="#9C9C9F"/></svg>
                    </i>
                </a>
                <div class="dropdown-body dropdown-menu">
                    <?php foreach (\common\enums\LanguagesEnum::forSelect() as $language => $label): ?>
                        <a class="lang-link" href="<?= Url::current(['language' => $language]) ?>"><?= $label ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="search-input">
                <form action="/search" method="get">
                    <input class="input" type="text" name="query" placeholder="<?= Yii::t('app', 'Введите слово') ?>">
                    <button class="btn btn-search" type="submit">
                        <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd"
                                  d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="social-medium-wrap">
            <div class="social-medium"><img class="medium-img" alt="#" src="/images/icons/icons-medium.jpg">
                <svg class="bi bi-chevron-double-down double-img social-arrows" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/><path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg>
                <ul class="social-menu site-menu social-dropdown">
                    <?php foreach ($socialLinks as $key => $link): ?>
                        <li class="dropdown-item-<?= $key+1 ?>">
                            <a target="_blank" href="<?= $link->content ?>">
                                <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>
                                <i class="fa fa-<?= \common\enums\SettingsEnum::socialLinks()[$link->type] ?> fa-2x icons ds-flex-align"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <nav class="site-nav">
            <ul class="nav-menu site-menu">
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                    <a href="/">
                        <?= Yii::t('app', 'Главная') ?>
                    </a>
                </li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                    <a href="#">
                        <?= Yii::t('app', 'Электронный архив') ?>
                    </a>
                </li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                    <a href="#">
                        <?= Yii::t('app', 'Версия для слабовидящих') ?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<header class="header-clone the-header header-pd"><a class="logotype ds-flex" href="/"><img src="<?= $logo ?>"></a><a class="menu-toggle" href="#0">
        Меню <span class="icon-menu"><svg class="bi bi-list-nested" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">  <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z"/>
        </svg></span></a></header>
<nav class="nav-wrapper"><a class="nav-close" href="#0"><svg class="bi bi-backspace-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg></a>
    <ul class="main-nav site-menu">
        <li><a href="#">Главная</a></li>
        <li><a href="#">тест</a></li>
        <li><a href="#">456</a></li>
        <li><a href="#">Smart spaces</a></li>
    </ul>
</nav>