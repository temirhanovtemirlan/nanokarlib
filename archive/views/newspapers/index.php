<?php
/* @var $this yii\web\View */
/* @var $models common\models\literature\Newspaper[] */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $title string */
/* @var $from string */
/* @var $to string */

$this->title = Yii::t('app', 'Газеты');
$models = $dataProvider->getModels();
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= \yii\bootstrap4\Html::encode($this->title) ?></h3>
    </header>
    <div class="container">
        <form action="<?= \yii\helpers\Url::to(['/newspapers/index']) ?>" method="get">
            <div class="main-filter row">
                <div class="col-md-8">
                    <input type="text" <?php if (strlen($title)): ?> value="<?= $title ?>" <?php endif; ?> placeholder="<?= Yii::t('app', 'Введите название журнала') ?>" class="input form-input" name="title" />
                </div>
                <div class="col-md-2">
                    <input type="text" placeholder="<?= Yii::t('app', 'От') ?>" class="input form-input" name="from" onfocus="(this.type='date')" onblur="(this.type='text')" />
                </div>
                <div class="col-md-2">
                    <input type="text" placeholder="<?= Yii::t('app', 'До') ?>" class="input form-input" name="to" onfocus="(this.type='date')" onblur="(this.type='text')" />
                </div>
            </div>
        </form>
        <?php if (sizeof($models)): ?>
            <?php foreach ($models as $model): ?>
                <?= $this->render($model->getRecordTemplate(), ['model' => $model]) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
