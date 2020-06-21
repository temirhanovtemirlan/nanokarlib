<?php
namespace archive\controllers;

use archive\models\ResendVerificationEmailForm;
use archive\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use archive\models\PasswordResetRequestForm;
use archive\models\ResetPasswordForm;
use archive\models\SignupForm;
use archive\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends \common\controllers\SiteController
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
