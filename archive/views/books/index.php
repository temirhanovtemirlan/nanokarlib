<?php
/* @var $this yii\web\View */
/* @var $models common\models\literature\Book[] */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filter archive\filters\BooksFilter */

$this->title = Yii::t('app', 'Книги');
$models = $dataProvider->getModels();
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= \yii\bootstrap4\Html::encode($this->title) ?></h3>
    </header>
    <div class="container">
        <?php if (sizeof($models)): ?>
            <?php foreach ($models as $model): ?>
            <?= $this->render($model->getRecordTemplate(), ['model' => $model]) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
