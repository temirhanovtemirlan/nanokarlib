<?php
/* @var $model common\models\Category */

$this->title = $model->getAttribute('name_'.Yii::$app->language);
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $model->getAttribute('name_'.Yii::$app->language) ?></h3>
    </header>
    <div class="container content">
        <p class="title">
            <?= $model->getAttribute('description_'.Yii::$app->language) ?>
        </p>
        <div class="accordion" id="accordion">
            <?php if ($model->publication): ?>
                <?php foreach ($model->publication as $key => $publication): ?>
                    <div class="card">
                        <div class="card-header ds-flex <?= ($key != 0) ?: 'collapsed' ?>" data-toggle="collapse" data-target="#collapse<?= $key ?>"
                             aria-expanded="true">
                            <div class="accordion-item">
                                <span><?= $publication->title ?></span>
                            </div>
                            <span class="accicon">
                        <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <svg class="bi bi-chevron-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </span>
                        </div>
                        <div class="collapse <?= ($key != 0) ?: 'show' ?>" id="collapse<?= $key ?>" data-parent="#accordion">
                            <div class="card-body">
                                <p><?= $publication->announce ?></p>
                                <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/publication', 'canonical_title' => $publication->canonical_title]) ?>">
                                    <?= Yii::t('app', 'Подробнее') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="section_pd">
                    <?= \yii\bootstrap4\LinkPager::widget([
                        'pagination' => new \yii\data\Pagination([
                            'totalCount' => sizeof($model->publication),
                            'pageSize' => 10
                        ])
                    ]) ?>
                </div>
            <?php else: ?>
                <div>
                    <?= Yii::t('app', 'Ничего не найдено') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>