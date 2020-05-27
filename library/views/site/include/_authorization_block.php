<?php
/* @var $totalUsers string */
/* @var $librarySpace string */
/* @var $libraryFond string */
/* @var $background string */
?>
<div class="authorization-block" style="background-image: <?= $background ?>">
    <div>
        <?= Yii::t('app', 'Читателей: {count}', ['count' => $totalUsers]) ?>
        <?= Yii::t('app', 'Пространства: {space}', ['space' => $librarySpace])?>
        <?= Yii::t('app', 'Фонд: {fond}', ['fond' => $libraryFond])?>
    </div>
    <a class="btn btn-primary" href="<?= \yii\helpers\Url::to(['/site/auth']) ?>"><?= Yii::t('app', 'Войти') ?></a>
</div>