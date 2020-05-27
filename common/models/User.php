<?php

namespace common\models;

use common\components\ActiveRecord;
use common\enums\UserEnum;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $email_validation_key
 * @property string $auth_key
 * @property integer $status
 * @property string $ts
 * @property array $roles
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => UserEnum::STATUS_INACTIVE],
            ['status', 'in', 'range' => array_keys(UserEnum::labels())],
            ['roles', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => UserEnum::STATUS_ACTIVE]);
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return void|IdentityInterface|null
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => UserEnum::STATUS_ACTIVE]);
    }

    public static function findByEmailValidationKey($token) {
        return static::findOne([
            'email_validation_key' => $token,
            'status' => UserEnum::STATUS_INACTIVE
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new token for email verification
     * @throws Exception
     */
    public function generateEmailValidationKey()
    {
        $this->email_validation_key = \Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return array|string[]
     */
    public function arrayAttributes()
    {
        return ['roles'];
    }

    public function beforeSave($insert)
    {
        $this->username = str_replace(' ', '', $this->username);
        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'Логин'),
            'email' => \Yii::t('app', 'Почта'),
            'roles' => \Yii::t('app', 'Роли'),
            'status' => \Yii::t('app', 'Статус'),
        ];
    }
}