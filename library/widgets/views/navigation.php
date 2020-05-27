<?php
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => $brandLabel,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => \Yii::t('app', 'Меню'), 'url' => '#'],
    ['label' => \Yii::t('app', 'Мы в социальных сетях'), 'url' => '#'],
    ['label' => \Yii::t('app', 'Архив'), 'url' => 'http://archive.karlib.kz'],
    ['label' => \common\enums\LanguagesEnum::label(Yii::$app->language), 'items' => $languages],
];
if (Yii::$app->user->isGranted(['ROLE_ADMIN'])) $menuItems[] = ['label' => \Yii::t('app', 'Панель администратора'), 'url' => 'http://dashboard.karlib.kz'];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/auth']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
