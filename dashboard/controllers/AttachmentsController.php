<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\enums\AttachmentsEnum;
use common\models\Attachment;
use common\services\AttachmentService;
use dashboard\filters\AttachmentsFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

class AttachmentsController extends AdminController
{
    /**
     * @var AttachmentService
     */
    private $attachmentService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_ATTACHMENTS'];
    }

    public function actionIndex()
    {
        $model = new AttachmentsFilter();
        return $this->render('index', [
            'dataProvider' => $model->search(\Yii::$app->request->queryParams),
            'filterModel' => $model
        ]);
    }

    public function actionCreate()
    {
        $model = new Attachment();
        $model->type = \Yii::$app->request->get('t');
        $model->relative_type = \Yii::$app->request->get('rt');
        $model->relative_id = \Yii::$app->request->get('rid') ?? 0;
        $path = \Yii::$app->request->get('path') ?? 'l';

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(\Yii::$app->request->get('rUrl') ?? ['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'path' => $path
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
            'model' => $this->attachmentService->findOne($id),
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
        $model = $this->attachmentService->findOne($id);

        $model->delete();

        return $this->redirect('index');
    }

    public function actionPublish($id)
    {
        $this->attachmentService->publishAttachment($id);

        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionUnpublish($id)
    {
        $this->attachmentService->unpublishAttachment($id);

        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionUpload($p)
    {
        $model = $this->attachmentService->getModel();
        $image = UploadedFile::getInstance($model, 'image');
        $fileName = $image->baseName . uniqid();
        $path = \Yii::getAlias('@libraryUploadPath') . '/' . $fileName . '.' . $image->extension;
        if ($p == 'a') {
            $path = \Yii::getAlias('@archiveUploadPath') . '/' . $fileName . '.' . $image->extension;
        }
        $image->saveAs($path);

        return Json::encode([
            'path' => '/uploads/' . $fileName . '.' . $image->extension,
            'name' => $fileName . '.' . $image->extension,
            'deleteUrl' => 'img-delete?name' . $fileName . '.' . $image->extension,
        ]);
    }

    public function actionRemove($name)
    {
        if (file_exists(\Yii::getAlias('@libraryUploadPath') . '/' . $name)) {
            unlink(\Yii::getAlias('@libraryUploadPath') . '/' . $name);
            return $this->goBack();
        }

        return '';
    }

    public function init()
    {
        parent::init();
        $this->attachmentService = \Yii::$app->attachmentService;
    }
}