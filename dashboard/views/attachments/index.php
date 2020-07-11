<?php

/* @var $this yii\web\View */
/* @var $dataProvider common\filters\AttachmentFilter */
/* @var $filterModel common\models\Attachment */

$this->title = Yii::t('app', 'Вложения');
?>

<div class="attachments-index">
    <p>
        <a href="<?= \yii\helpers\Url::to(['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_LIBRARY_LOGO]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Логотип библиотеки') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_SMART_SPACES_MAP]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Карта smart-пространств') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_AUTH_BLOCK_BACKGROUND]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Фон блока авторизации') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_IMAGE, 'rt' => \common\enums\AttachmentsEnum::RELATION_SLIDER]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Фото к слайдеру') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/attachments/create', 't' => \common\enums\AttachmentsEnum::TYPE_VIDEO, 'rt' => \common\enums\AttachmentsEnum::RELATION_SLIDER]) ?>" class="btn btn-primary"><?= Yii::t('app', 'Видео к слайдеру') ?></a>
    </p>

    <?php \yii\widgets\Pjax::begin(); ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            'id',
            [
                'attribute' => 'type',
                'value' => function ($model) { return \common\enums\AttachmentsEnum::label($model->type); },
                'filter' => \common\enums\AttachmentsEnum::types(),
            ],
            [
                'attribute' => 'relative_type',
                'value' => function ($model) { return \common\enums\AttachmentsEnum::label($model->relative_type); },
                'filter' => \common\enums\AttachmentsEnum::relations(),
            ],
            [
                'attribute' => 'source',
                'filter' => false,
            ],

            ['class' => 'common\components\ActionColumn', 'template' => '{view} {delete}']
        ]
    ]); ?>

    <?php \yii\widgets\Pjax::end() ?>
</div>
