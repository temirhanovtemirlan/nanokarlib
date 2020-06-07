<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\models\SmartSpace;
use common\services\SmartSpaceService;
use dashboard\filters\SmartSpacesFilter;

class SmartSpacesController extends AdminController
{
    /**
     * @var SmartSpaceService
     */
    private $smartSpaceService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_SMART_SPACES'];
    }

    public function actionIndex()
    {
        $model = new SmartSpacesFilter();
        return $this->render('index', [
            'dataProvider' => $model->search(\Yii::$app->request->queryParams),
            'filterModel' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new SmartSpace();

        if ($model->load(\Yii::$app->request->post()) && $this->smartSpaceService->save($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
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
            'model' => $this->smartSpaceService->findOne($id),
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->smartSpaceService->findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $this->smartSpaceService->save($model)) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model
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
        $this->smartSpaceService->findOne($id)->delete();

        return $this->redirect('index');
    }

    public function init()
    {
        parent::init();
        $this->smartSpaceService = \Yii::$app->smartSpaceService;
    }
}