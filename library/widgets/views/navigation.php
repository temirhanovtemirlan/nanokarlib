<?php
use yii\helpers\Url;
/* @var $logo string */
/* @var $brandLabel string */
/* @var $menuItems common\models\Category[] */
/* @var $socialLinks common\models\Setting[] */
?>
<header class="site-header">
    <div class="header-top">
        <div class="hamburger-menu">
            <button class="menu__btn btn"><span></span></button>
            <ul class="dropdown-catalog-list">
                <?php foreach ($menuItems as $item): ?>
                    <li class="dropdown-catalog-item">
                        <a href="<?= Url::to(['/site/section', 'url' => $item->getAttribute('url_'.Yii::$app->language)]) ?>">
                            <?= $item->getAttribute('name_'.Yii::$app->language) ?>
                        </a>
                    </li>
                    <?php if ($item->children): ?>
                    <div class="dropdown-cat">
                        <ul class="dropdown-cat-list">
                            <?php foreach ($item->children as $child):?>
                                <li class="dropdown-cat-item">
                                    <a class="parent" href="<?= Url::to(['/site/section', 'url' => $child->getAttribute('name_'.Yii::$app->language)]) ?>">
                                        <?= $child->getAttribute('name_'.Yii::$app->language) ?>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="site-logo wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s"><a class="logotype ds-flex" href="/"><img src="<?= $logo ?>"></a>
            <h1 class="text-img"><?= $brandLabel ?></h1>
        </div>
        <div class="search-input">
            <input class="input" type="text" name="search" placeholder="Search and hit enter">
            <button class="btn btn-search" type="submit"><svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="header-bottom">
        <div class="social-medium-wrap">
            <div class="social-medium"><img class="medium-img" alt="#" src="/images/icons/icons-medium.jpg"><svg class="bi bi-chevron-double-down double-img social-arrows" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                <div class="social-menu">
                    <ul class="site-menu social-dropdown">
                        <?php foreach ($socialLinks as $link):?>
                            <li class="dropdown-item-1">
                                <a href="<?= $link->content ?>">
                                    <i class="fa fa-<?= \common\enums\SettingsEnum::socialLinks()[$link->type] ?>"></i>
                                    <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="site-nav">
            <ul class="nav-menu site-menu">
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                    <a href="/"><?= Yii::t('app', 'Главная') ?></a>
                </li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                    <a href="#"><?= Yii::t('app', 'Электронный архив') ?></a>
                </li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s"><a href="#">ARCHIVE</a></li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s"><a href="#">GALLERY</a></li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s"><a href="#">CATEGORIES</a></li>
                <li class="wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s"><a href="#">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</header>