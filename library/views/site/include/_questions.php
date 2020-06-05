<?php
/* @var $dataProvider common\filters\QuestionFilter */
/* @var $models common\models\Question[] */

$models = $dataProvider->getModels(); ?>

<section class="section-fag section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Вопросы и ответы') ?></h3>
    </header>
    <div class="container">
        <div class="fag-slide-wrap">
            <div class="fag-slide slide">
                <?php if ($models): $models = array_chunk($models, 4, true); ?>
                <?php foreach ($models as $chunkedModels): ?>
                    <div class="fag-items">
                        <div class="row fag_mr">
                            <?php foreach ($chunkedModels as $key => $model): ?>
                                <div class="col-md-6">
                                    <div class="fag-item ds-flex">
                                        <div class="fag-counters">
                                            <span class="count ds-flex-align"><?= $key + 1 ?></span>
                                        </div>
                                        <div class="fag-text">
                                            <h5><?= $model->text ?></h5>
                                            <p><?= $model->answer ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-btn justify-content-center">
                <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/ask']) ?>">
                    <?= Yii::t('app', 'Задать вопрос') ?>
                </a>
            </div>
        </div>
    </div>
</section>
