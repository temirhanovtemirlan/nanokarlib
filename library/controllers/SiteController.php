<?php
namespace library\controllers;

use common\models\Feedback;
use common\models\Question;
use common\models\RenewalApplication;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends \common\controllers\SiteController
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

        return $this->render('section', [
            'model' => $section,
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
}
