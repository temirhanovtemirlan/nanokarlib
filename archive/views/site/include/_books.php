<?php
/* @var $models common\models\literature\Book[] */
/* @var $provider yii\data\ActiveDataProvider */

$models = $provider->getModels();
?>

<section class="section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Книги') ?></h3>
    </header>
    <div class="container">
        <div class="section-list_pd">
            <div class="review-slide slide">
                <?php if ($models): ?>
                    <?php foreach ($models as $model): ?>
                    <div class="review-item d-flex">
                        <div class="img-responsive w-50">
                            <img src="<?= $model->image->source ?>">
                        </div>
                        <div class="w-50">
                            <div class="text"><?= $model->title ?></div>
                            <p>
                                <span class="author"><?= $model->author ?></span>
                            </p>
                            <p class="lead">
                                <?= $model->getAttribute('description_'.Yii::$app->language) ?>
                            </p>
                            <p><i class="fa fa-star text-secondary"></i>
                                <?= Yii::t('app', 'Рейтинг: {count}', ['count' => $model->rating]) ?>
                            </p>
                            <p><i class="fa fa-eye text-secondary"></i>
                                <?= Yii::t('app', 'Просмотров: {count}', ['count' => count($model->views)]) ?>
                            </p>
                            <p><i class="fa fa-download text-secondary"></i>
                                <?= Yii::t('app', 'Загрузок: {count}', ['count' => count($model->downloads)]) ?>
                            </p>
                            <p>
                                <a href="<?= \yii\helpers\Url::to(['/books/view', 'canonical_title' => $model->canonical_title]) ?>" class="btn submit"><?= Yii::t('app', 'Подробнее') ?></a>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-btn justify-content-center">
            <a class="btn submit" href="<?= \yii\helpers\Url::to(['/books/index']) ?>">
                <?= Yii::t('app', 'Все книги') ?>
            </a>
        </div>
    </div>
</section>