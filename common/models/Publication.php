<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class Publication
 * @package common\models
 * @property int $id
 * @property string $language
 * @property int $category_id
 * @property string $announce
 * @property string $title
 * @property string $canonical_title
 * @property string $body
 * @property string $ts
 * @property boolean $published
 */
class Publication extends ActiveRecord
{
    public static function tableName()
    {
        return 'publications';
    }

    public function rules()
    {
        return [
            [['language', 'category_id', 'announce', 'title', 'canonical_title', 'body'], 'required'],
            [['language', 'category_id', 'announce', 'title', 'canonical_title', 'body'], 'string'],
            ['category_id', 'exist', 'targetClass' => Category::class, 'targetAttribute' => 'id'],
            ['canonical_title', 'unique'],
            ['published', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'language' => \Yii::t('app', 'Язык'),
            'category_id' => \Yii::t('app', 'Раздел'),
            'announce' => \Yii::t('app', 'Анонс'),
            'title' => \Yii::t('app', 'Заголовок'),
            'canonical_title' => \Yii::t('app', 'Канонический заголовок'),
            'body' => \Yii::t('app', 'Текст публикации'),
            'published' => \Yii::t('app', 'Опубликовано'),
        ];
    }

    public function getCategory()
    {
        return Category::findOne($this->category_id)->getAttribute('name_'.\Yii::$app->language);
    }
}