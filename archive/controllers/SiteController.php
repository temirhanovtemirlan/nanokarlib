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
use yii\web\NotFoundHttpException;

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
        $this->layout = false;
        return $this->render('index', [
            'authBlock' => Yii::$app->settingService->getLibrarySettings(),
            'authBlockBackground' => Yii::$app->attachmentService->getAuthBlockBackground(),
            'booksProvider' => Yii::$app->literatureService->getBooksProvider(),
            'newspapersProvider' => Yii::$app->literatureService->getNewspapersProvider(),
            'magazinesProvider' => Yii::$app->literatureService->getMagazinesProvider(),
        ]);
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('query');

        return $this->render('search', [
            'dataProvider' => Yii::$app->literatureService->getSearchProvider($search)
        ]);
    }

    public function actionRead($filename)
    {
        if (!file_exists(Yii::getAlias('@archive') . '/web' . $filename)) {
            throw new NotFoundHttpException();
        }

        return $this->render('read', [
            'source' => $filename
        ]);
    }
}
