<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\services\FeedbackService;

class FeedbacksController extends AdminController
{
    /**
     * @var FeedbackService
     */
    private $feedbackService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_FEEDBACKS'];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => $this->feedbackService->getFilter()->search(\Yii::$app->request->queryParams)
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->feedbackService->findOne($id),
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->feedbackService->findOne($id)->delete();

        return $this->redirect('index');
    }

    public function actionPublish($id)
    {
        $this->feedbackService->publishOnMainPage($id);

        return $this->refresh();
    }

    public function actionUnpublish($id)
    {
        $this->feedbackService->unpublishFromMainPage($id);

        return $this->refresh();
    }

    public function init()
    {
        parent::init();
        $this->feedbackService = \Yii::$app->feedbackService;
    }
}