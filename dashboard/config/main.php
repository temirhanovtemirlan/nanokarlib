<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php'
);

return [
    'id' => 'dashboard',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'dashboard\controllers',
    'bootstrap' => ['log'],
    'name' => 'Панель администратора',
    'language' => 'ru',
    'timeZone' => 'Asia/Almaty',
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '',
        ],
        'user' => [
            'class' => 'common\services\UserService',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'dashboard-karlib',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
            'languages' => ['ru', 'kk'],
        ],
    ],
    'params' => $params,
];
