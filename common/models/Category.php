<?php

namespace common\models;

use common\components\ActiveRecord;
use common\enums\CategoriesEnum;

/**
 * Class Category
 * @package common\models
 * @property int $id
 * @property int $type
 * @property string $name_ru
 * @property string $name_kk
 * @property string $name_en
 * @property string $url_ru
 * @property string $url_kk
 * @property string $url_en
 * @property string $description_en
 * @property string $description_ru
 * @property string $description_kk
 * @property int $parent_id
 * @property string $ts
 * @property int $published
 */
class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [['name_ru', 'name_kk', 'name_en'], 'unique'],
            ['type', 'in', 'range' => array_keys(CategoriesEnum::labels())],
            ['name_ru', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить название на русском')],
            ['name_kk', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить название на казахском')],
            ['name_en', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить название на английском')],
            ['url_ru', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить ссылку для открытия на русском')],
            ['url_kk', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить ссылку для открытия на казахском')],
            ['url_en', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить ссылку для открытия на английском')],
            ['description_ru', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить описание на русском')],
            ['description_kk', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить описание на казахском')],
            ['description_en', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить описание на английском')],
            ['published', 'boolean'],
            ['parent_id', 'integer'],
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
            'url_ru' => \Yii::t('app', 'Ссылка на русском'),
            'url_kk' => \Yii::t('app', 'Ссылка на казахском'),
            'url_en' => \Yii::t('app', 'Ссылка на английском'),
            'parent_id' => \Yii::t('app', 'Родительский раздел'),
            'published' => \Yii::t('app', 'Опубликовано'),
        ];
    }

    public function getParent()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    public function getChildren()
    {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }
}