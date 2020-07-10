<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Publication */
/* @var $attachments common\filters\AttachmentFilter */
/* @var $modelAttachments common\models\Attachment[] */

$this->title = Yii::t('app', 'Публикация') . ': ' . $model->title;
?>

<div class="publication-view">
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data-confirm' => \Yii::t('yii', 'Вы уверены, что хотите удалить эту запись?'),
            'data-method' => 'post'])
        ?>
        <?= Html::a(Yii::t('app', 'Добавить фото'), ['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_PUBLICATION, 'rid' => $model->id, 'rUrl' => '/publications/view?id='.$model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Добавить видео'), ['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_VIDEO, 'rt' => \common\enums\AttachmentsEnum::RELATION_PUBLICATION, 'rid' => $model->id, 'rUrl' => '/publications/view?id='.$model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'language',
                'value' => \common\enums\LanguagesEnum::label($model->language)
            ],
            [
                'attribute' => 'category_id',
                'value' => $model->category->getAttribute('name_'.Yii::$app->language),
            ],
            'title',
            'canonical_title',
            'announce',
            'body',
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ]
        ],
    ]) ?>

    <?php
    $modelAttachments = $attachments->getModels();
    foreach ($modelAttachments as $attachment) {
        echo $this->render($attachment->getRenderTemplate(), ['source' => $attachment->source]);
    }
    ?>
</div>
