<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\models\Category;
use common\services\CategoryService;

class CategoriesController extends AdminController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_CATEGORIES'];
    }

    public function actionIndex()
    {
        $dataProvider = $this->categoryService->getFilter();
        return $this->render('index', [
            'filterModel' => $dataProvider,
            'dataProvider' => $dataProvider->search(\Yii::$app->request->queryParams)
        ]);
    }

    public function actionCreate()
    {
        $model = new Category();
        $child = \Yii::$app->request->get('child');

        if ($model->load(\Yii::$app->request->post()) && $this->categoryService->save($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dataProvider' => $child ? $this->categoryService->getFilter()->search([]) : '',
            'child' => $child ?? false,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->categoryService->findOne($id)
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->categoryService->findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $this->categoryService->save($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dataProvider' => $model->parent_id ? $this->categoryService->getFilter()->search([]) : '',
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->categoryService->findOne($id);
        if ($this->categoryService->delete($model)) {
            return $this->redirect(['index']);
        }
    }

    public function init()
    {
        parent::init();
        $this->categoryService = \Yii::$app->categoryService;
    }
}