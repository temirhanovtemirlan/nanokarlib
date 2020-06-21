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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                ['label' => Yii::t('app', 'Пользователи'), 'url' => Url::to(['/users/index'])],
                ['label' => Yii::t('app', 'Настройки'), 'url' => Url::to(['/settings/index'])],
                ['label' => Yii::t('app', 'Разделы'), 'url' => Url::to(['/categories/index'])],
                ['label' => Yii::t('app', 'Публикации'), 'url' => Url::to(['/publications/index'])],
                ['label' => Yii::t('app', 'Smart-пространства'), 'url' => Url::to(['/smart-spaces/index'])],
                ['label' => Yii::t('app', 'Вложения'), 'url' => Url::to(['/attachments/index'])],
                ['label' => Yii::t('app', 'Отзывы'), 'url' => Url::to(['/feedbacks/index'])],
                ['label' => Yii::t('app', 'Вопросы и ответы'), 'url' => Url::to(['/questions/index'])],
                ['label' => Yii::t('app', 'Заявки на продление сроков чтения'), 'url' => Url::to(['/renewal-applications/index'])],
                ['label' => Yii::t('app', 'Книги'), 'url' => Url::to(['/literature/books/index'])],
                ['label' => Yii::t('app', 'Газеты'), 'url' => Url::to(['/literature/newspapers/index'])],
                ['label' => Yii::t('app', 'Журналы'), 'url' => Url::to(['/literature/magazines/index'])],
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
