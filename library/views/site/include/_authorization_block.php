<?php
/* @var $totalUsers string */
/* @var $librarySpace string */
/* @var $libraryFond string */
/* @var $background string */
?>
<section class="main-header">
    <div class="leading">
        <div class="leading-wrap">
            <div class="leading-row row">
                <div class="col-leading">
                    <img class="wow fadeIn" alt="#" src="/images/leading/leading_1.png" data-wow-delay=".6s" data-wow-duration=".6s">
                    <p class="leading-text wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                        <span class="counter">
                            <?= $libraryFond ?>
                        </span>
                        <?= Yii::t('app', 'Фонд библиотеки') ?>
                    </p>
                </div>
                <div class="col-leading">
                    <img class="wow fadeIn" alt="#" src="/images/leading/leading_2.png" data-wow-delay=".6s" data-wow-duration=".6s">
                    <p class="leading-text wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                        <span>
                            <?= $totalUsers ?>+
                        </span>
                        <?= Yii::t('app', 'Читателей') ?>
                    </p>
                </div>
                <div class="col-leading">
                    <img class="wow fadeIn" alt="#" src="/images/leading/leading_3.png" data-wow-delay=".6s" data-wow-duration=".6s">
                    <p class="leading-text wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                        <span>
                            <?= $librarySpace ?> <span><?= Yii::t('app', 'м') ?><sup><small>2</small></sup></span>
                        </span>
                        <?= Yii::t('app', 'Пространства') ?>
                    </p>
                </div>
            </div>
            <div class="form-btn justify-content-center">
                <a class="btn leading-link fade-in-fwd wow fadeIn" href="<?= \yii\helpers\Url::to(['/site/auth']) ?>" data-wow-delay=".3s">
                    <?= Yii::t('app', 'Авторизация') ?>
                </a>
            </div>
        </div>
    </div>
</section>
