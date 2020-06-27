<?php

namespace archive\controllers;

use yii\web\Controller;

class NewspapersController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = \Yii::$app->literatureService->getNewspapersProviderBySearch(\Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'filter' => \Yii::$app->literatureService->getNewspapersFilter()
        ]);
    }

    public function actionView($canonical_title)
    {
        $model = \Yii::$app->literatureService->findNewspaper($canonical_title);
        \Yii::$app->literatureService->addView($model->id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionDownload($id)
    {

    }
}