<?php

namespace common\components;

use common\forms\LoginForm;
use common\services\UserService;
use yii\base\Action;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class AdminController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @param Action $action
     * @return bool|Response
     * @throws BadRequestHttpException
     * @throws ForbiddenHttpException
     */
    public function beforeAction($action)
    {
        $loginPage = $action->id === 'login';
        $isAdmin = $this->userService->isGranted(['ROLE_ADMIN']);
        $isSuperAdmin = $this->userService->isGranted(['ROLE_SUPER_ADMIN']);
        if ($this->userService->isGuest && !$loginPage) {

            return $this->redirect(['login']);
        }

        if ($loginPage && !$this->userService->isGuest) {

            return $this->redirect(['index']);
        }

        if (!$loginPage && !$isAdmin) {

            throw new ForbiddenHttpException(\Yii::t('app', 'Недостаточно прав для просмотра данной страницы.'));
        }

        if (!$isSuperAdmin && sizeof($this->allowedRoles()) && !$this->userService->isGranted($this->allowedRoles())) {

            throw new ForbiddenHttpException(\Yii::t('app', 'Недостаточно прав для просмотра данной страницы.'));
        }

        return parent::beforeAction($action);
    }

    public function actionLogin()
    {
        $login = new LoginForm();

        if ($login->load(\Yii::$app->request->post()) && $this->userService->authorizeUser($login)) {
            return $this->goBack();
        }

        return $this->render('/admin/login', [
            'model' => $login,
        ]);
    }

    public function actionLogout()
    {
        $this->userService->logout();

        return $this->goHome();
    }

    public function actionError()
    {
        return $this->render('/admin/error', [
            'exception' => \Yii::$app->errorHandler->exception,
            'message' => \Yii::$app->errorHandler->exception->getMessage(),
        ]);
    }

    public function allowedRoles()
    {
        return [];
    }

    public function init()
    {
        parent::init();
        $this->userService = \Yii::$app->user;
    }
}