<?php

namespace console\controllers;

use common\enums\UserEnum;
use common\models\User;
use yii\base\Exception;
use yii\console\Controller;

class UsersController extends Controller
{
    /**
     * @throws Exception
     */
    public function actionIndex()
    {
        $user = new User();
        $user->username = 'admin';
        $user->email = \Yii::$app->params['adminEmail'];
        $user->setPassword('Yii2IsTheBestFrameWork4Ever');
        $user->generateAuthKey();
        $user->generateEmailValidationKey();
        $user->roles = ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN', 'ROLE_ADMIN'];
        $user->status = UserEnum::STATUS_ACTIVE;
        $user->save();

        echo 'done';
    }
}