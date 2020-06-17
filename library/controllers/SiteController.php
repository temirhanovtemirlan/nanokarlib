<?php
namespace library\controllers;

use common\forms\LoginForm;
use common\forms\RegistrationForm;
use common\models\Feedback;
use common\models\Publication;
use common\models\Question;
use common\models\RenewalApplication;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
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
            'title' => \Yii::$app->settingService->getLibraryBrandLabel(),
            'authBlockBackground' => \Yii::$app->attachmentService->getAuthBlockBackground(),
            'totalUsers' => \Yii::$app->user->getUsersCount(),
            'settings' => \Yii::$app->settingService->getLibrarySettings(),
            'smartSpacesProvider' => \Yii::$app->smartSpaceService->getPublishedSmartSpaces(),
            'smartSpacesMap' => \Yii::$app->attachmentService->getSmartSpacesMap(),
            'questionsProvider' => \Yii::$app->questionService->getPublishedQuestions(),
            'feedbackProvider' => \Yii::$app->feedbackService->getPublishedRecords(),
            'additionalSections' => \Yii::$app->categoryService->getAdditionalSections(),
            'renewalApplication' => \Yii::$app->renewalApplicationService->getModel(),
            'socialLinks' => \Yii::$app->settingService->getSocialLinks(),
            'mapSettings' => \Yii::$app->settingService->getMapSettings(),
        ]);
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

    /**
     * @throws ForbiddenHttpException|BadRequestHttpException
     */
    public function actionSendRenewalApplication()
    {
        if (\Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException(\Yii::t('app', 'Необходимо авторизоваться'));
        }
        $model = new RenewalApplication();
        $model->user_id = \Yii::$app->user->id;

        if ($model->load(\Yii::$app->request->post()) && \Yii::$app->renewalApplicationService->sendRenewalApplication($model)) {
            \Yii::$app->session->setFlash('success', \Yii::t('app', 'Вы успешно подали заявку'));
            return $this->redirect(['index']);
        }

        throw new BadRequestHttpException(\Yii::t('app', 'Данные введены неверно'));
    }

    /**
     * @return string|Response
     * @throws ForbiddenHttpException
     */
    public function actionAsk()
    {
        if (\Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException(\Yii::t('app', 'Необходимо авторизоваться'));
        }
        $model = new Question();
        $model->user_id = \Yii::$app->user->id;

        if ($model->load(\Yii::$app->request->post()) && \Yii::$app->questionService->sendQuestion($model)) {
            \Yii::$app->session->setFlash('success', \Yii::t('app', 'Вопрос успешно отправлен модератору'));
            return $this->redirect(['index']);
        }

        return $this->render('ask', [
            'model' => $model
        ]);
    }

    /**
     * @return string|Response
     * @throws ForbiddenHttpException
     */
    public function actionReview()
    {
        if (\Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException(\Yii::t('app', 'Необходимо авторизоваться'));
        }

        $model = new Feedback();
        $model->user_id = \Yii::$app->user->id;

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('app', 'Вы успешно отправили отзыв');
            return $this->redirect(['index']);
        }

        return $this->render('review', [
            'model' => $model
        ]);
    }

    /**
     * @param $url
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionSection($url)
    {
        $section = \Yii::$app->categoryService->getSectionByUrl($url);

        if (!$section) {
            throw new NotFoundHttpException(\Yii::t('app', 'Страница не найдена'));
        }

        $provider = new ActiveDataProvider([
            'query' => Publication::find()->where(['category_id' => $section->id])->andWhere(['published' => true])->orderBy('ts DESC'),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('section', [
            'model' => $section,
            'provider' => $provider,
        ]);
    }

    public function actionPublication($canonical_title)
    {
        return $this->render('publication', [
            'model' => \Yii::$app->publicationService->getPublicationByCanonicalTitle($canonical_title)
        ]);
    }

    public function actionSearch($query)
    {
        return $this->render('search', [
            'dataProvider' => \Yii::$app->publicationService->searchByQuery($query)->setPageSize(20),
        ]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goBack();
    }
}
