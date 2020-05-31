<?php
namespace dashboard\controllers;

use common\components\AdminController;

/**
 * Site controller
 */
class SiteController extends AdminController
{
    public function actions()
    {
        return [
            'class' => 'yii\web\ErrorAction',
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['/users/index']);
    }
}
