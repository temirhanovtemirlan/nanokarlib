<?php
/* @var $totalUsers string */
/* @var $librarySpace string */
/* @var $libraryFond string */
/* @var $background string */
?>
<section class="main-header main-content">
    <div class="leading" style="background-image: url('<?= $background ?>')">
        <div class="leading-wrap">
            <div class="leading-row row">
                <div class="col-leading">
                    <img class="wow fadeIn" alt="#" src="/images/leading/leading_1.png" data-wow-delay=".6s" data-wow-duration=".6s">
                    <p class="leading-text wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
                        <span class="counter">
                            <?= $libraryFond ?>+
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
                            <?= $librarySpace ?> <?= Yii::t('app', 'м') ?><sup><small>2</small></sup>
                        </span>
                        <?= Yii::t('app', 'Пространства') ?>
                    </p>
                </div>
            </div>
            <div class="form-btn justify-content-center">
                <?php if (Yii::$app->user->isGuest): ?>
                    <a class="btn leading-link fade-in-fwd wow fadeIn" href="<?= \yii\helpers\Url::to(['/site/auth']) ?>" data-wow-delay=".3s">
                        <?= Yii::t('app', 'Авторизация') ?>
                    </a>
                <?php else: ?>
                    <a class="btn leading-link fade-in-fwd wow fadeIn" data-wow-delay=".3s" href="<?= \yii\helpers\Url::to(['/site/logout']) ?>" data-method="post">
                        <?= Yii::t('app', 'Выйти') ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
