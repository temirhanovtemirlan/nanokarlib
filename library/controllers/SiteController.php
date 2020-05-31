<?php
namespace library\controllers;

use common\forms\LoginForm;
use common\forms\RegistrationForm;
use common\models\RenewalApplication;
use common\services\AttachmentService;
use common\services\FeedbackService;
use common\services\QuestionService;
use common\services\RenewalApplicationService;
use common\services\SettingService;
use common\services\SmartSpaceService;
use common\services\UserService;
use yii\base\Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * @var AttachmentService
     */
    private $attachmentService;

    /**
     * @var SmartSpaceService
     */
    private $smartSpaceService;

    /**
     * @var QuestionService
     */
    private $questionService;

    /**
     * @var FeedbackService
     */
    private $feedbackService;

    /**
     * @var RenewalApplicationService
     */
    private $renewalApplicationService;

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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'title' => $this->settingService->getLibraryBrandLabel(),
            'authBlockBackground' => $this->attachmentService->getAuthBlockBackground(),
            'totalUsers' => $this->userService->getUsersCount(),
            'settings' => $this->settingService->getLibrarySettings(),
            'smartSpacesProvider' => $this->smartSpaceService->getPublishedSmartSpaces(),
            'smartSpacesMap' => $this->attachmentService->getSmartSpacesMap(),
            'questionsProvider' => $this->questionService->getPublishedQuestions(),
            'feedbackProvider' => $this->feedbackService->getPublishedRecords(),
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionAuth()
    {
        if (!$this->userService->isGuest) {
            return $this->redirect(['index']);
        }
        $login = new LoginForm();

        if ($login->load(\Yii::$app->request->post()) && $this->userService->authorizeUser($login)) {
            return $this->goBack();
        }

        return $this->render('auth', [
            'login' => $login,
        ]);
    }

    /**
     * @return string|Response
     * @throws Exception
     */
    public function actionRegistration()
    {
        if (!$this->userService->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && $this->userService->createNewUser($model)) {
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
        $user = $this->userService->findUserByToken($token);

        if (!$user) {
            throw new NotFoundHttpException(\Yii::t('app', 'Страница не найдена'));
        }

        $this->userService->verifyEmail($user);

        return $this->render('verify');
    }

    /**
     * @throws ForbiddenHttpException
     */
    public function actionSendRenewalApplication()
    {
        if (\Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException(\Yii::t('app', 'Необходимо авторизоваться'));
        }
        $model = new RenewalApplication();
        $model->user_id = \Yii::$app->user->id;

        if ($model->load(\Yii::$app->request->post()) && $this->renewalApplicationService->sendRenewalApplication($model)) {
            \Yii::$app->session->setFlash('success', \Yii::t('app', 'Заявка успешно отправлена на обработку'));
            return $this->redirect(['index']);
        }

        return '';
    }

    public function actionLogout()
    {
        $this->userService->logout();

        return $this->goBack();
    }

    public function init()
    {
        parent::init();
        $this->userService = \Yii::$app->user;
        $this->settingService = \Yii::$app->settingService;
        $this->attachmentService = \Yii::$app->attachmentService;
        $this->smartSpaceService = \Yii::$app->smartSpaceService;
        $this->questionService = \Yii::$app->questionService;
        $this->feedbackService = \Yii::$app->feedbackService;
        $this->renewalApplicationService = \Yii::$app->renewalApplicationService;
    }
}
