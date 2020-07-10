<?php

namespace common\components;

use Throwable;
use yii\base\InvalidConfigException;

class User extends \yii\web\User
{
    /**
     * @var array
     */
    public $roles;

    /**
     * Проверка на наличие роли. strict = строгая проверка на все перечисленные роли
     *
     * @param array|string $roles
     * @param bool $strict
     * @return bool
     * @throws
     */
    public function isGranted($roles, $strict = true)
    {
        if (!is_array($roles) || is_string($roles)) {
            $roles = [$roles];
        }

        // роли активного пользователя
        $user_roles = $this->roles;

        // переключатель проверки на наличие ролей
        $isGranted = false;

        /**
         * Строгая проверка на наличие всех ролей. Если одна из указанных ролей отсутствует в массиве ролей пользователя,
         * значит, пользователь не прошёл проверку на наличие роли.
         */
        foreach ($roles as $role) {
            $isGranted = in_array($role, $user_roles);

            if (!$strict && $isGranted) {
                break;
            }
        }

        return $isGranted;
    }

    /**
     * Инициализация ролей
     * @throws Throwable
     */
    public function initRoles()
    {
        $this->roles = ['ROLE_GUEST'];

        if (!$this->getIsGuest()) {
            $this->roles = $this->getIdentity()->getRoles();
        }
    }

    /**
     * @throws Throwable
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->initRoles();
    }
}