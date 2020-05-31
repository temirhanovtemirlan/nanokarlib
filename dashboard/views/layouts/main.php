<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\enums\LanguagesEnum;
use dashboard\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/users/index'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-dark',
        ],
    ]);
    $menuItems = [
        'menu' => [
            'label' => Yii::t('app', 'Меню'),
            'items' => [
                ['label' => Yii::t('app', 'Пользователи'), 'url' => \yii\helpers\Url::to(['/users/index'])],
                ['label' => Yii::t('app', 'Настройки'), 'url' => \yii\helpers\Url::to(['/settings/index'])],
                ['label' => Yii::t('app', 'Разделы'), 'url' => \yii\helpers\Url::to(['/categories/index'])],
                ['label' => Yii::t('app', 'Публикации'), 'url' => \yii\helpers\Url::to(['/publications/index'])],
                ['label' => Yii::t('app', 'Смарт-пространства'), 'url' => \yii\helpers\Url::to(['/smart-spaces/index'])],
                ['label' => Yii::t('app', 'Вложения'), 'url' => \yii\helpers\Url::to(['/attachments/index'])],
                ['label' => Yii::t('app', 'Отзывы'), 'url' => \yii\helpers\Url::to(['/feedbacks/index'])],
                ['label' => Yii::t('app', 'Вопросы и ответы'), 'url' => \yii\helpers\Url::to(['/questions/index'])],
                ['label' => Yii::t('app', 'Заявки на продление сроков чтения'), 'url' => \yii\helpers\Url::to(['/renewal-applications/index'])],
            ],
        ],
        'language' => [
            'label' => Yii::t('app', 'Язык'),
            'items' => [
                'ru' => ['label' => LanguagesEnum::label('ru'), 'url' => Url::current(['language' => 'ru'])],
                'kk' => ['label' => LanguagesEnum::label('kk'), 'url' => Url::current(['language' => 'kk'])],
                'en' => ['label' => LanguagesEnum::label('en'), 'url' => Url::current(['language' => 'en'])],
            ]
        ]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('app', 'Выйти'),
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
