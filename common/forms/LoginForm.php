<?php

namespace common\forms;

use common\models\User;

class LoginForm extends \yii\base\Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    public function rules()
    {
        return [
            ['username', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить логин')],
            ['password', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить пароль')],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, \Yii::t('app', 'Неверный логин или пароль'));
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'Логин'),
            'password' => \Yii::t('app', 'Пароль'),
            'rememberMe' => \Yii::t('app', 'Запомнить меня'),
        ];
    }
}