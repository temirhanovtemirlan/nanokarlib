<?php

namespace common\enums;

use common\components\Enum;

class CategoriesEnum extends Enum
{
    const TYPE_MENU = 1;
    const TYPE_ADDITIONAL = 2;

    public static function labels()
    {
        return [
            self::TYPE_MENU => \Yii::t('app', 'Разделы меню'),
            self::TYPE_ADDITIONAL => \Yii::t('app', 'Дополнительные разделы'),
        ];
    }
}