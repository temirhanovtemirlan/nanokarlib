<?php
/* @var $dataProvider common\filters\QuestionFilter */

$models = $dataProvider->getModels();
if ($models): ?>

<div class="questions-block">
    <?php foreach ($models as $model): ?>
    <div class="question">

    </div>
    <?php endforeach; ?>
    <a class="btn-primary"><?= Yii::t('app', 'Задать вопрос') ?></a>
</div>
<?php endif; ?>
