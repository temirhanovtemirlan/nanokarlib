<?php
/* @var $dataProvider common\filters\FeedbackFilter */

$models = $dataProvider->getModels();
if ($models): ?>
<div class="feedbacks">
    <?php foreach ($models as $model): ?>

    <?php endforeach; ?>
    <a class="btn-primary"><?= Yii::t('app', 'Оставить отзыв') ?></a>
</div>
<?php endif; ?>
