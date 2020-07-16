<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\literature\Book */

$this->title = Yii::t('app', 'Книга') . ': ' . $model->title;
?>

<div class="publication-view">
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data-confirm' => \Yii::t('yii', 'Вы уверены, что хотите удалить эту запись?'),
            'data-method' => 'post'])
        ?>
        <?= Html::a(Yii::t('app', 'Добавить картинку'), ['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_LITERATURE, 'rid' => $model->id, 'path' => 'a', 'rUrl' => '/literature/books/view?id='.$model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Добавить PDF'), ['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_PDF, 'rt' => \common\enums\AttachmentsEnum::RELATION_LITERATURE, 'rid' => $model->id, 'path' => 'a', 'rUrl' => '/literature/books/view?id='.$model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'author',
            'title',
            'canonical_title',
            'description_ru',
            'description_kk',
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ],
            [
                'attribute' => 'readable',
                'value' => \common\enums\PublishedEnum::label($model->readable)
            ],
            [
                'attribute' => 'downloadable',
                'value' => \common\enums\PublishedEnum::label($model->downloadable)
            ],
        ],
    ]) ?>
</div>
