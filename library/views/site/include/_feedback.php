<?php
/* @var $dataProvider common\filters\FeedbackFilter */
/* @var $models common\models\Feedback[] */
/* @var $socialLinks common\models\Setting[] */

$models = $dataProvider->getModels();?>
<section class="reviews">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Отзывы') ?></h3>
    </header>
    <div class="container">
        <div class="section-list_pd">
            <div class="review-slide slide">
                <?php if ($models): ?>
                <?php foreach ($models as $model): ?>
                    <div class="review-item">
                        <div class="review-wrap">
                            <div class="review-text ds-menu-center">
                                <p class="text">
                                    <?= $model->message ?>
                                </p><span class="author"><?= $model->full_name ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-btn justify-content-center">
                <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/review']) ?>">
                    <?= Yii::t('app', 'Оставить отзыв') ?>
                </a>
            </div>
            <div class="review-social-wrap">
                <div class="review-social-slide">
                    <div class="social-item">
                        <ul class="site-menu ds-menu-center">
                            <?php foreach ($socialLinks as $link): ?>
                                <li>
                                    <a href="<?= $link->content ?>" title="<?= \common\enums\SettingsEnum::label($link->type) ?>">
                                        <i class="fa fa-<?= \common\enums\SettingsEnum::socialLinks()[$link->type] ?> fa-2x icons ds-flex-align"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
