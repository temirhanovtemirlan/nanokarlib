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
    <div class="container">
        <div class="main-filter row">
            <div class="col-md-9">
                <input type="text" placeholder="<?= Yii::t('app', 'Введите название книги') ?>" class="input form-input" name="title" />
            </div>
            <div class="col-md-3">
                <select name="sort" class="select form-input">
                    <option value="<?= \archive\filters\BooksFilter::SORT_BY_RECOMMENDED ?>"><?= Yii::t('app', 'Рекомендации') ?></option>
                    <option value="<?= \archive\filters\BooksFilter::SORT_BY_POPULAR ?>"><?= Yii::t('app', 'Популярные') ?></option>
                    <option value="<?= \archive\filters\BooksFilter::SORT_BY_NEW ?>"><?= Yii::t('app', 'Новинки') ?></option>
                </select>
            </div>
        </div>
        <?php if (sizeof($models)): ?>
            <?php foreach ($models as $model): ?>
            <?= $this->render($model->getRecordTemplate(), ['model' => $model]) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
