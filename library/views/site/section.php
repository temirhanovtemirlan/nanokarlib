<?php
/* @var $model common\models\Category */
/* @var $provider yii\data\ActiveDataProvider */
/* @var $publications common\models\Publication[] */

$this->title = $model->getAttribute('name_'.Yii::$app->language);
$publications = $provider->getModels();
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $model->getAttribute('name_'.Yii::$app->language) ?></h3>
    </header>
    <div class="container content">
        <p class="leading-text wow fadeIn p-4">
            <?= $model->getAttribute('description_'.Yii::$app->language) ?>
        </p>
        <div class="accordion" id="accordion">
            <?php if ($publications): ?>
                <?php foreach ($publications as $publication): ?>
                    <div class="card">
                        <div class="card-header collapsed ds-flex" data-toggle="collapse" data-target="#collapse1"
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
                        <div class="collapse show" id="collapse1" data-parent="#accordion">
                            <div class="card-body">
                                <p><?= $publication->announce ?></p>
                                <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/publication', 'canonical_title' => $publication->canonical_title]) ?>">
                                    <?= Yii::t('app', 'Подробнее') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?= \yii\bootstrap4\LinkPager::widget([
                    'pagination' => $provider->pagination
                ]) ?>
            <?php else: ?>
                <div>
                    <?= Yii::t('app', 'Ничего не найдено') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>