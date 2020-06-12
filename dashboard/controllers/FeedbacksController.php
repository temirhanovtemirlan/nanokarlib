<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\services\FeedbackService;
use dashboard\filters\FeedbacksFilter;

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
        $model = new FeedbacksFilter();
        return $this->render('index', [
            'dataProvider' => $model->search(\Yii::$app->request->queryParams),
            'filterModel' => $model,
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
            'model' => $this->feedbackService->find()->where(['id' => $id])->with(['user'])->one(),
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