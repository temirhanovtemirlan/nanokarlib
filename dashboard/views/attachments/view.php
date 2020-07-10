<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Attachment */

$this->title = Yii::t('app', 'Вложение');
?>

<div class="publication-view">
    <p>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data-confirm' => \Yii::t('yii', 'Вы уверены, что хотите удалить эту запись?'),
            'data-method' => 'post'])
        ?>
        <?php
        if ($model->published) {
            echo Html::a(Yii::t('app', 'Снять с публикации'), ['unpublish', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } else {
            echo Html::a(Yii::t('app', 'Опубликовать'), ['publish', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'type',
                'value' => \common\enums\AttachmentsEnum::label($model->type)
            ],
            [
                'attribute' => 'relative_type',
                'value' => \common\enums\AttachmentsEnum::label($model->relative_type),
            ],
            'relative_id',
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ]
        ],
    ]) ?>

    <?= $this->render($model->getRenderTemplate(), ['source' => $model->source]) ?>
</div>
