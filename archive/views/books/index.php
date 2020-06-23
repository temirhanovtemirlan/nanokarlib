<?php
/* @var $this yii\web\View */
/* @var $models common\models\literature\Book[] */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Книги');
$models = $dataProvider->getModels();
?>
<section class="section_pd main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= \yii\bootstrap4\Html::encode($this->title) ?></h3>
    </header>
</section>
