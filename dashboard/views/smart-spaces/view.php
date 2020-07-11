<?php
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SmartSpace */

$this->title = Yii::t('app', 'Smart-пространство') . ': ' . $model->getAttribute('name_'.Yii::$app->language);
?>

<div class="users-view">
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data-confirm' => \Yii::t('yii', 'Вы уверены, что хотите удалить эту запись?'),
            'data-method' => 'post'])
        ?>
        <?= Html::a(Yii::t('app', 'Добавить фото'), ['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_SMART_SPACE, 'rid' => $model->id, 'rUrl' => '/smart-spaces/view?id='.$model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description_ru',
            'description_kk',
            'description_en',
            'name_ru',
            'name_kk',
            'name_en',
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ]
        ],
    ]) ?>

</div>
