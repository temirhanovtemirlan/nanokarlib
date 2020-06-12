<?php

namespace common\enums;

use common\components\Enum;

class AttachmentsEnum extends Enum
{
    const TYPE_IMAGE = 1;
    const TYPE_VIDEO = 2;

    const RELATION_PUBLICATION = 11;
    const RELATION_SLIDER = 12;
    const RELATION_SMART_SPACE = 13;
    const RELATION_SMART_SPACES_MAP = 14;
    const RELATION_AUTH_BLOCK_BACKGROUND = 15;
    const RELATION_LIBRARY_LOGO = 16;

    public static function labels()
    {
        return [
            self::TYPE_IMAGE => \Yii::t('app', 'Изображение'),
            self::TYPE_VIDEO => \Yii::t('app', 'Видео-материал'),
            self::RELATION_PUBLICATION => \Yii::t('app', 'К публикации'),
            self::RELATION_SLIDER => \Yii::t('app', 'К слайдеру'),
            self::RELATION_SMART_SPACE => \Yii::t('app', 'К смарт-пространству'),
            self::RELATION_SMART_SPACES_MAP =>  \Yii::t('app', 'Карта смарт-пространств'),
            self::RELATION_AUTH_BLOCK_BACKGROUND => \Yii::t('app', 'Фон блока авторизации'),
            self::RELATION_LIBRARY_LOGO => \Yii::t('app', 'Логотип библиотеки'),
        ];
    }

    public static function types()
    {
        return [
            self::TYPE_IMAGE => \Yii::t('app', 'Изображение'),
            self::TYPE_VIDEO => \Yii::t('app', 'Видео-материал'),
        ];
    }

    public static function relations()
    {
        return [
            self::RELATION_PUBLICATION => \Yii::t('app', 'К публикации'),
            self::RELATION_SLIDER => \Yii::t('app', 'К слайдеру'),
            self::RELATION_SMART_SPACE => \Yii::t('app', 'К смарт-пространству'),
            self::RELATION_SMART_SPACES_MAP =>  \Yii::t('app', 'Карта смарт-пространств'),
            self::RELATION_AUTH_BLOCK_BACKGROUND => \Yii::t('app', 'Фон блока авторизации'),
            self::RELATION_LIBRARY_LOGO => \Yii::t('app', 'Логотип библиотеки'),
        ];
    }
}