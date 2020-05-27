<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class SmartSpace
 * @package common\models
 * @property int $id
 * @property string $name_ru
 * @property string $name_kk
 * @property string $name_en
 * @property string $description_ru
 * @property string $description_kk
 * @property string $description_en
 * @property boolean $published
 * @property string $ts
 */
class SmartSpace extends ActiveRecord
{
    public static function tableName()
    {
        return 'smart_spaces';
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_kk', 'name_en'], 'unique'],
            ['name_ru', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить название на русском')],
            ['name_kk', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить название на казахском')],
            ['name_en', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить название на английском')],
            ['description_ru', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить описание на русском')],
            ['description_kk', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить описание на казахском')],
            ['description_en', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить описание на английском')],
            ['published', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'type' => \Yii::t('app', 'Тип'),
            'description_ru' => \Yii::t('app', 'Описание на русском'),
            'description_kk' => \Yii::t('app', 'Описание на казахском'),
            'description_en' => \Yii::t('app', 'Описание на английском'),
            'name_ru' => \Yii::t('app', 'Название на русском'),
            'name_kk' => \Yii::t('app', 'Название на казахском'),
            'name_en' => \Yii::t('app', 'Название на английском'),
            'published' => \Yii::t('app', 'Опубликовано'),
        ];
    }
}