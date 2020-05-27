<?php

namespace dashboard\controllers;

use common\models\Setting;
use common\services\SettingService;
use yii\bootstrap4\ActiveForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SettingsController extends \common\components\AdminController
{
    /**
     * @var SettingService
     */
    private $settingService;

    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_SETTINGS'];
    }

    public function actionIndex()
    {
        $dataProvider = $this->settingService->getFilter();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return array|string
     * @throws NotFoundHttpException
     */
    public function actionSave($id)
    {
        if (\Yii::$app->request->isAjax) {
            $setting = Setting::findOne($id);

            if ($setting->load(\Yii::$app->request->post()) && $this->settingService->save($setting)) {
                return \Yii::t('app', 'Изменения сохранены');
            } else {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($setting);
            }
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function init()
    {
        parent::init();
        $this->settingService = \Yii::$app->settingService;
    }
}