<?php

namespace common\enums;

use common\components\Enum;

class PublishedEnum extends Enum
{
    const PUBLISHED = 1;
    const NOT_PUBLISHED = 0;

    public static function labels()
    {
        return [
            self::PUBLISHED => \Yii::t('app', 'Да'),
            self::NOT_PUBLISHED => \Yii::t('app', 'Нет'),
        ];
    }
}