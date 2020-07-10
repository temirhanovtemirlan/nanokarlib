<?php


namespace common\controllers;


use common\forms\LoginForm;
use common\forms\RegistrationForm;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return string|Response
     */
    public function actionAuth()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }
        $login = new LoginForm();

        if ($login->load(\Yii::$app->request->post()) && \Yii::$app->user->authorizeUser($login)) {
            return $this->goBack();
        }

        return $this->render('auth', [
            'model' => $login
        ]);
    }

    /**
     * @return string|Response
     * @throws Exception
     */
    public function actionRegistration()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && \Yii::$app->user->createNewUser($model)) {
            \Yii::$app->session->setFlash('success', \Yii::t('app', 'На указанную вами почту отправлено письмо с подтверждением.'));
            return $this->goBack();
        }

        return $this->render('registration', [
            'model' => $model
        ]);
    }

    /**
     * @param $token
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionVerify($token)
    {
        $user = \Yii::$app->user->findUserByToken($token);

        if (!$user) {
            throw new NotFoundHttpException(\Yii::t('app', 'Страница не найдена'));
        }

        \Yii::$app->user->verifyEmail($user);

        return $this->render('verify');
    }


    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goBack();
    }
}