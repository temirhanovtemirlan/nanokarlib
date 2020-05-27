<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\services\QuestionService;

class QuestionsController extends AdminController
{
    /**
     * @var QuestionService
     */
    private $questionService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_QUESTIONS'];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => $this->questionService->getFilter(),
            'filterModel' => $this->questionService->getModel()
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->questionService->findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $this->questionService->save($model)) {
            return $this->refresh();
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->questionService->findOne($id);

        $model->delete();

        return $this->redirect('index');
    }

    public function init()
    {
        parent::init();
        $this->questionService = \Yii::$app->questionService;
    }
}