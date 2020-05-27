<?php

namespace common\services;

use common\enums\UserEnum;
use common\forms\LoginForm;
use common\forms\RegistrationForm;
use common\models\User;
use common\filters\UsersFilter;
use yii\base\Exception;
use yii\mail\MailerInterface;

class UserService extends \common\components\User
{
    /**
     * @var MailerInterface
     */
    private $mailerService;

    public function getFilter()
    {
        return new UsersFilter();
    }

    /**
     * @param LoginForm $form
     * @return bool
     */
    public function authorizeUser(LoginForm $form)
    {
        return $this->login($form->getUser(), $form->rememberMe ? 3600 * 24 * 30 : 0);
    }

    /**
     * @param RegistrationForm $form
     * @return bool
     * @throws Exception
     */
    public function createNewUser(RegistrationForm $form)
    {
        if (!$form->validate()) {
            return false;
        }

        $user = new User();
        $user->username = $form->username;
        $user->email = $form->email;
        $user->setPassword($form->password);
        $user->generateAuthKey();
        $user->generateEmailValidationKey();
        $user->roles = ['ROLE_USER'];
        //$this->sendValidationEmail($user);

        return $user->save();
    }

    /**
     * @param RegistrationForm $form
     * @return bool
     * @throws Exception
     */
    public function createNewAdmin(RegistrationForm $form)
    {
        if (!$form->validate()) {
            return false;
        }
        $user = new User();
        $user->username = $form->username;
        $user->email = $form->email;
        $user->setPassword($form->password);
        $user->generateAuthKey();
        $user->generateEmailValidationKey();
        $user->roles = ['ROLE_USER', 'ROLE_ADMIN'];
        $user->status = UserEnum::STATUS_ACTIVE;

        return $user->save();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function sendValidationEmail(User $user)
    {
        $mail = $this->mailerService->compose();
        $mail->setFrom(\Yii::$app->params['adminEmail']);
        $mail->setTo($user->email);
        $mail->setSubject(\Yii::t('app', 'Подтвердите свою электронную почту'));
        $mail->setTextBody($this->getValidationEmailTextBody($user));
        $mail->setHtmlBody($this->getValidationEmailHtmlBody($user));
        return $mail->send();
    }

    /**
     * @param User $user
     * @return string
     */
    private function getValidationEmailTextBody(User $user)
    {
        return $user->email_validation_key;
    }

    /**
     * @param User $user
     * @return string
     */
    private function getValidationEmailHtmlBody(User $user)
    {
        return $user->email_validation_key;
    }

    /**
     * @param $token
     * @return array|\yii\db\ActiveRecord|User|null
     */
    public function findUserByToken($token)
    {
        return User::find()->where(['email_validation_key' => $token])->andWhere(['status' => UserEnum::STATUS_INACTIVE])->one();
    }

    public function verifyEmail(User $user)
    {
        $user->status = UserEnum::STATUS_ACTIVE;

        $user->save();

        return $this->login($user);
    }

    public function blockUser(User $user)
    {
        $user->status = UserEnum::STATUS_INACTIVE;

        return $user->save();
    }

    public function getUsersCount()
    {
        return $this->getFilter()->count();
    }

    public function init()
    {
        parent::init();
        $this->mailerService = \Yii::$app->mailer;
    }
}