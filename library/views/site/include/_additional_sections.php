<?php
/* @var $models common\models\Category[] */
/* @var $dataProvider common\filters\CategoryFilter */
$models = $dataProvider->getModels();
?>
<section class="smart-dropdown section_pd">
    <div class="container">
        <div class="accordion" id="accordion">
            <?php foreach ($models as $model): ?>
            <div class="card">
                <div class="card-header collapsed ds-flex" data-toggle="collapse" data-target="#collapse1" aria-expanded="true">
                    <div class="accordion-item">
                        <img alt="#" src="/images/icons/icons-category.png">
                        <span><?= $model->getAttribute('name_'.Yii::$app->language) ?></span>
                    </div>
                    <span class="accicon">
                        <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <svg class="bi bi-chevron-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </span>
                </div>
                <div class="collapse show" id="collapse1" data-parent="#accordion">
                    <div class="card-body">
                        <p><?= $model->getAttribute('description_'.Yii::$app->language)?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>