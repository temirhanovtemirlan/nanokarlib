<?php

namespace common\forms;

use common\models\User;

class RegistrationForm extends \yii\base\Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить логин')],
            ['email', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить почту')],
            ['password', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить пароль')],
            ['email', 'email'],
            ['username', 'filter', 'filter' => 'trim'],
            ['password', 'string', 'min' => 8],
            ['username', 'string', 'min' => 6],
            ['username', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'],
            ['email', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'Логин'),
            'password' => \Yii::t('app', 'Пароль'),
            'email' => \Yii::t('app', 'Электронная почта'),
        ];
    }
}