<?php

namespace dashboard\controllers;

use common\components\AdminController;
use common\services\RenewalApplicationService;

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
        return $this->render('index', [
            'dataProvider' => $this->renewalApplicationService->getFilter()->search(\Yii::$app->request->queryParams),
            'filterModel' => $this->renewalApplicationService->getModel(),
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