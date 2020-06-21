<?php

namespace common\enums;

use common\components\Enum;

class LiteratureEnum extends Enum
{
    const TYPE_BOOK = 1;
    const TYPE_NEWSPAPER = 2;
    const TYPE_MAGAZINE = 3;

    public static function labels()
    {
        return [
            self::TYPE_BOOK => \Yii::t('app', 'Книги'),
            self::TYPE_NEWSPAPER => \Yii::t('app', 'Газеты'),
            self::TYPE_MAGAZINE => \Yii::t('app', 'Журналы'),
        ];
    }
}