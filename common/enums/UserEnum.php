<?php

namespace common\enums;

use common\components\Enum;

class UserEnum extends Enum
{
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public static function labels()
    {
        return [
            self::STATUS_ACTIVE => \Yii::t('app', 'Активен'),
            self::STATUS_INACTIVE => \Yii::t('app', 'Неактивен'),
        ];
    }
}