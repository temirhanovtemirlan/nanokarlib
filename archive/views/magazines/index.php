<?php
/* @var $this yii\web\View */
/* @var $models common\models\literature\Magazine[] */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Журналы');
$models = $dataProvider->getModels();
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= \yii\bootstrap4\Html::encode($this->title) ?></h3>
    </header>
    <div class="container">
        <div class="main-filter row">
            <div class="col-md-8">
                <input type="text" placeholder="<?= Yii::t('app', 'Введите название журнала') ?>" class="input form-input" name="title" />
            </div>
            <div class="col-md-2">
                <input type="date" placeholder="<?= Yii::t('app', 'Введите название журнала') ?>" class="input form-input" name="from" />
            </div>
            <div class="col-md-2">
                <input type="date" placeholder="<?= Yii::t('app', 'Введите название журнала') ?>" class="input form-input" name="to" />
            </div>
        </div>
        <?php if (sizeof($models)): ?>
            <?php foreach ($models as $model): ?>
                <?= $this->render($model->getRecordTemplate(), ['model' => $model]) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
