<?php

namespace common\enums;

class LanguagesEnum extends \common\components\Enum
{
    const LANGUAGE_ENGLISH = 'en';
    const LANGUAGE_KAZAKH = 'kk';
    const LANGUAGE_RUSSIAN = 'ru';
    const LANGUAGE_ALL = 'all';

    public static function labels()
    {
        return [
            self::LANGUAGE_ENGLISH => \Yii::t('app', 'Английский'),
            self::LANGUAGE_KAZAKH => \Yii::t('app', 'Казахский'),
            self::LANGUAGE_RUSSIAN => \Yii::t('app', 'Русский'),
        ];
    }

    public static function forSelect()
    {
        $languages = self::labels();
        unset($languages[\Yii::$app->language]);

        return $languages;
    }

    public static function forArchive()
    {
        $languages = self::labels();
        unset($languages[\Yii::$app->language]);
        unset($languages[self::LANGUAGE_ENGLISH]);

        return $languages;
    }
}