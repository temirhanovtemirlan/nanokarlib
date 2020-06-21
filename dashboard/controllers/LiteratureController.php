<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\models\Literature;
use common\services\LiteratureService;
use dashboard\filters\literature\BooksFilter;

class LiteratureController extends AdminController
{
    /**
     * @var LiteratureService
     */
    private $literatureService;

    public function actionIndex()
    {
        $filter = $this->getFilter();
        return $this->render('index', [
            'filterModel' => $filter,
            'dataProvider' => $filter->search(\Yii::$app->request->queryParams),
        ]);
    }

    public function actionCreate()
    {
        $model = $this->getModel();

        if ($model->load(\Yii::$app->request->post()) && $this->literatureService->save($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->literatureService->find()->where(['id' => $id])->with(['image', 'source'])->one()
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->getModel()::findOne($id);
        if ($model->load(\Yii::$app->request->post()) && $this->literatureService->save($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $this->literatureService->findOne($id)->delete();

        return $this->redirect(['index']);
    }

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_LITERATURE'];
    }

    /**
     * @return Literature
     */
    protected function getModel()
    {
        return $this->literatureService->getModel();
    }

    protected function getFilter()
    {
        return null;
    }

    public function init()
    {
        parent::init();
        $this->literatureService = \Yii::$app->literatureService;
    }
}