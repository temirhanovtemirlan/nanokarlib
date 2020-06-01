<?php
/* @var $logo string */
/* @var $brandLabel string */
/* @var $menuItems common\models\Category[] */

?>
<div class="main-header">
    <header class="site-header">
        <div class="header-top">
            <div class="hamburger-menu">
                <button class="menu__btn btn"><span></span></button>
                <ul class="dropdown-catalog-list">
                    <?php foreach ($menuItems as $item): ?>
                    <li class="dropdown-catalog-item">
                        <a href="<?= \yii\helpers\Url::to(['categories/view', 'url' => $item->getAttribute('url_'.Yii::$app->language)]) ?>">
                            <?= $item->getAttribute('name_'.Yii::$app->language) ?>
                        </a>
                    <?php if (sizeof($item->children)): ?>
                        <div class="dropdown-cat">
                            <ul class="dropdown-cat-list">
                            <?php foreach ($item->children as $child): ?>
                                <li class="dropdown-cat-item">
                                    <a class="parent" href="<?= \yii\helpers\Url::to(['categories/view', 'url' => $child->getAttribute('url_'.Yii::$app->language)]) ?>">
                                        <?= $child->getAttribute('name_'.Yii::$app->language) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="site-logo">
                <div class="logotype ds-flex"><img src="<?= $logo ?>"></div>
                <h1><?= $brandLabel ?><h1>
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
                <div class="social-medium"><img class="medium-img" alt="#" src="/images/icons/icons-medium.jpg"><svg class="bi bi-chevron-double-down double-img" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
            </div>
            <nav class="site-nav">
                <ul class="nav-menu site-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/site/index']) ?>"><?= Yii::t('app', 'Главная') ?></a></li>
                    <li><a href="<?= Yii::$app->params['archiveUrl'] ?>"><?= Yii::t('app', 'Электронный архив') ?></a></li>
                    <li><a href="#">ARCHIVE</a></li>
                    <li><a href="#">GALLERY</a></li>
                    <li><a href="#">CATEGORIES</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </header>
</div>