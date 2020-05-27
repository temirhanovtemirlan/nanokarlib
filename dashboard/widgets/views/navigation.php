<?php
/* @var $this yii\web\View*/
?>
<div class="admin-panel">
    <?php ?>
    <div class="admin-item">
        <a href="<?= \yii\helpers\Url::to(['/users/index']) ?>"><?= Yii::t('app', 'Пользователи') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/settings/index']) ?>"><?= Yii::t('app', 'Настройки') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/categories/index']) ?>"><?= Yii::t('app', 'Категории') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/publications/index']) ?>"><?= Yii::t('app', 'Публикации') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/smart-spaces/index']) ?>"><?= Yii::t('app', 'Смарт-пространства') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/attachments/index']) ?>"><?= Yii::t('app', 'Вложения') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/feedbacks/index']) ?>"><?= Yii::t('app', 'Отзывы') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/questions/index']) ?>"><?= Yii::t('app', 'Вопросы и ответы') ?></a>
        <a href="<?= \yii\helpers\Url::to(['/renewal-applications/index']) ?>"><?= Yii::t('app', 'Заявки на продление книг') ?></a>
    </div>
    <?php ?>
</div>