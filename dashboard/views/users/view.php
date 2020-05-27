<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Пользователь') . ': ' . $model->username;
?>

<div class="users-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email',
            [
                'attribute' => 'status',
                'value' => \common\enums\UserEnum::label($model->status)
            ]
        ],
    ]) ?>

    <?php $form = ActiveForm::begin(['id' => 'user-view']); ?>

    <?= $form->field($model, 'roles')->widget(\unclead\multipleinput\MultipleInput::class, [
        'allowEmptyList'    => false,
        'enableGuessTitle'  => true,
        'addButtonPosition' => \unclead\multipleinput\MultipleInput::POS_ROW,
        'iconSource' => \unclead\multipleinput\MultipleInput::ICONS_SOURCE_FONTAWESOME,
    ])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success'])?>

        <?= Html::a(\Yii::t('app', 'Заблокировать'), ['block', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => [
            'confirm' => Yii::t('app', 'Вы уверены, что хотите заблокировать этого пользователя?'),
        ]]) ?>
    </div>

    <?php $form::end() ?>
</div>
