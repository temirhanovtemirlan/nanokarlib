<?php
/* @var $dataProvider common\filters\FeedbackFilter */
/* @var $models common\models\Feedback[] */

$models = $dataProvider->getModels();
if ($models): ?>
    <section class="reviews">
        <header class="section-head ds-flex-align">
            <h3 class="title"><?= Yii::t('app', 'Отзывы') ?></h3>
        </header>
        <div class="container">
            <div class="section-list_pd">
                <div class="review-slide slide">
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
                </div>
                <div class="form-btn justify-content-center">
                    <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/review']) ?>">
                        <?= Yii::t('app', 'Оставить отзыв') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
