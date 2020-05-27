<?php

namespace dashboard\controllers;

use common\forms\RegistrationForm;
use common\models\User;
use yii\base\Exception;
use yii\web\Response;

class UsersController extends \common\components\AdminController
{
    public function allowedRoles()
    {
        return ['ROLE_SPECIAL_USER'];
    }

    public function actionIndex()
    {
        $dataProvider = $this->userService->getFilter();
        return $this->render('index', [
            'filterModel' => $dataProvider,
            'dataProvider' => $dataProvider->search(\Yii::$app->request->queryParams),
        ]);
    }

    public function actionView($id)
    {
        $user = User::findOne($id);

        if ($user->load(\Yii::$app->request->post()) && $user->save()) {
            return $this->refresh();
        }

        return $this->render('view', [
            'model' => $user,
        ]);
    }

    /**
     * @return string|Response
     * @throws Exception
     */
    public function actionNewAdmin()
    {
        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && $this->userService->createNewAdmin($model)) {
            return $this->goBack();
        }

        return $this->render('new-admin', [
            'model' => $model
        ]);
    }

    /**
     * @param $id
     * @return Response
     */
    public function actionBlock($id)
    {
        $user = User::findOne($id);

        $this->userService->blockUser($user);

        return $this->redirect(['index']);
    }
}