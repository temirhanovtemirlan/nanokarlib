<?php

namespace archive\controllers;

use yii\web\Controller;

class MagazinesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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