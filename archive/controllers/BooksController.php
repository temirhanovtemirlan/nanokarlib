<?php

namespace archive\controllers;

use yii\web\Controller;

class BooksController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = \Yii::$app->literatureService->getBooksProviderBySearch(\Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'title' => \Yii::$app->request->get('title') ?? '',
            'sort' => \Yii::$app->request->get('sort') ?? ''
        ]);
    }

    public function actionView($canonical_title)
    {
        $model = \Yii::$app->literatureService->findBook($canonical_title);
        \Yii::$app->literatureService->addView($model->id);
        return $this->render('view', [
            'model' => $model
        ]);
    }
}