<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\models\Publication;
use common\services\AttachmentService;
use common\services\CategoryService;
use common\services\PublicationService;
use yii\helpers\ArrayHelper;

class PublicationsController extends AdminController
{
    /**
     * @var PublicationService
     */
    private $publicationService;

    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @var AttachmentService
     */
    private $attachmentService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_PUBLICATIONS'];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'filterModel' => $this->publicationService->getModel(),
            'dataProvider' => $this->publicationService->getFilter()->search(\Yii::$app->request->queryParams),
            'categories' => ArrayHelper::map($this->categoryService->getFilter()->search([])->getModels(), 'id', 'name_'.\Yii::$app->language),
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->publicationService->findOne($id),
            'attachments' => $this->attachmentService->getPublicationAttachments($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Publication();

        if ($model->load(\Yii::$app->request->post()) && $this->publicationService->save($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => ArrayHelper::map($this->categoryService->getFilter()->search([])->getModels(), 'id', 'name_'.\Yii::$app->language),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->publicationService->findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $this->publicationService->save($model)) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => ArrayHelper::map($this->categoryService->getFilter()->search([])->getModels(), 'id', 'name_'.\Yii::$app->language),
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response|null
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->publicationService->findOne($id);

        if ($this->publicationService->delete($model)) {
            return $this->redirect(['index']);
        }

        return null;
    }

    public function init()
    {
        parent::init();
        $this->publicationService = \Yii::$app->publicationService;
        $this->categoryService = \Yii::$app->categoryService;
        $this->attachmentService = \Yii::$app->attachmentService;
    }
}