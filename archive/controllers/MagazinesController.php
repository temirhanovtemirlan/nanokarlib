<?php

namespace archive\controllers;

use yii\web\Controller;

class MagazinesController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = \Yii::$app->literatureService->getMagazinesProviderBySearch(\Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($canonical_title)
    {
        $model = \Yii::$app->literatureService->findMagazine($canonical_title);
        \Yii::$app->literatureService->addView($model->id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionDownload($id)
    {

    }
}