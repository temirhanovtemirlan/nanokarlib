<?php
/* @var $this yii\web\View */
/* @var $models common\models\literature\Magazine[] */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $title string */
/* @var $from string */
/* @var $to string */

$this->title = Yii::t('app', 'Журналы');
$models = $dataProvider->getModels();
?>
<section class="main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= \yii\bootstrap4\Html::encode($this->title) ?></h3>
    </header>
    <div class="container content">
        <form action="<?= \yii\helpers\Url::to(['/magazines/index']) ?>" method="get">
            <div class="main-filter row">
                <div class="col-md-8">
                    <input type="text" <?php if (strlen($title)): ?> value="<?= $title ?>" <?php endif; ?> placeholder="<?= Yii::t('app', 'Введите название журнала') ?>" class="input form-input" name="title" />
                </div>
                <div class="col-md-2">
                    <input type="text" <?php if (strlen($from)): ?> value="<?= $from ?>" <?php endif; ?> placeholder="<?= Yii::t('app', 'От') ?>" class="input form-input" name="from" onfocus="(this.type='date')" onblur="(this.type='text')" />
                </div>
                <div class="col-md-2">
                    <input type="text" <?php if (strlen($to)): ?> value="<?= $to ?>" <?php endif; ?> placeholder="<?= Yii::t('app', 'До') ?>" class="input form-input" name="to" onfocus="(this.type='date')" onblur="(this.type='text')" />
                </div>
            </div>
        </form>
        <?php if (sizeof($models)): ?>
            <div class="pt-2">
                <?php foreach ($models as $model): ?>
                    <?= $this->render($model->getRecordTemplate(), ['model' => $model]) ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
