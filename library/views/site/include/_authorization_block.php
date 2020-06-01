<?php
/* @var $totalUsers string */
/* @var $librarySpace string */
/* @var $libraryFond string */
/* @var $background string */
?>
<div class="main-header">
    <div class="leading">
        <div class="leading-wrap">
            <div class="leading-row row">
                <div class="col-leading">
                    <img alt="#" src="/images/leading/leading_1.png">
                    <p class="leading-text">
                    <span>
                        <?= $libraryFond ?>
                    </span>
                        <?= Yii::t('app', 'Фонд библиотеки') ?>
                    </p>
                </div>
                <div class="col-leading">
                    <img alt="#" src="/images/leading/leading_2.png">
                    <p class="leading-text">
                        <span>
                            <?= $totalUsers ?>
                        </span>
                        <?= Yii::t('app', 'Читателей') ?>
                    </p>
                </div>
                <div class="col-leading">
                    <img alt="#" src="/images/leading/leading_3.png">
                    <p class="leading-text">
                        <span>
                            <?= $librarySpace ?> <span><?= Yii::t('app', 'м') ?><sup><small>2</small></sup></span>
                        </span>
                        <?= Yii::t('app', 'Пространства') ?>
                    </p>
                </div>
            </div>
            <div class="form-btn justify-content-center">
                <a class="btn leading-link" href="<?= \yii\helpers\Url::to(['/site/auth']) ?>">
                    <?= Yii::t('app', 'Авторизация') ?>
                </a>
            </div>
        </div>
    </div>
</div>