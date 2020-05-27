<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('app', 'Отзыв');
?>

<div class="question-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data-confirm' => \Yii::t('yii', 'Вы уверены, что хотите удалить эту запись?'),
            'data-method' => 'post'])
        ?>
        <?php
        if ($model->published) {
            echo Html::a(Yii::t('app', 'Снять с публикации'), ['unpublish', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        else {
            echo Html::a(Yii::t('app', 'Опубликовать на главной странице'), ['publish', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => $model->getUser()
            ],
            'full_name',
            'message:ntext',
            [
                'attribute' => 'published',
                'value' => \common\enums\PublishedEnum::label($model->published)
            ]
        ],
    ]) ?>
</div>
