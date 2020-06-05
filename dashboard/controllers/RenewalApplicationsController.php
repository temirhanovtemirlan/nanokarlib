<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\services\RenewalApplicationService;
use dashboard\filters\RenewalApplicationsFilter;

class RenewalApplicationsController extends AdminController
{
    /**
     * @var RenewalApplicationService
     */
    private $renewalApplicationService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_RENEWAL_APPLICATIONS'];
    }

    public function actionIndex()
    {
        $model = new RenewalApplicationsFilter();

        return $this->render('index', [
            'dataProvider' => $model->search(\Yii::$app->request->queryParams),
            'filterModel' => $model
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
        $this->renewalApplicationService->findOne($id)->delete();
        return $this->refresh();
    }

    public function init()
    {
        parent::init();
        $this->renewalApplicationService = \Yii::$app->renewalApplicationService;
    }
}