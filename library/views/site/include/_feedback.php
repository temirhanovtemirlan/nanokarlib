<?php
/* @var $dataProvider common\filters\FeedbackFilter */
/* @var $models common\models\Feedback[] */

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
                            <div class="review-img">
                                <img alt="#" src="/images/review-img.png">
                            </div>
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
                            <li><a href="#" title="facebook"><i class="fa fa-whatsapp fa-2x icons ds-flex-align"></i></a></li>
                            <li><a href="#" title="google-plus"><i class="fa fa-paper-plane fa-2x icons ds-flex-align"></i></a></li>
                            <li><a href="#" title="maps"><i class="fa fa-facebook fa-2x icons ds-flex-align"></i></a></li>
                            <li><a href="#" title="vk"><i class="fa fa-twitter fa-2x icons ds-flex-align"></i></a></li>
                            <li><a href="#" title="instagram"><i class="fa fa-vk fa-2x icons ds-flex-align"></i></a></li>
                            <li><a href="#" title="123"><i class="fa fa-odnoklassniki fa-2x icons ds-flex-align"></i></a></li>
                            <li><a href="#" title="456"><i class="fa fa-youtube fa-2x icons ds-flex-align"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
