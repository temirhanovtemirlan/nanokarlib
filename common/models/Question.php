<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class Question
 * @package common\models
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property string $answer
 * @property string $ts
 * @property boolean $published
 */
class Question extends ActiveRecord
{
    public static function tableName()
    {
        return 'questions';
    }

    public function rules()
    {
        return [
            [['user_id', 'text'], 'required'],
            ['text', 'string', 'min' => 50],
            ['answer', 'string', 'min' => 50],
            ['published', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => \Yii::t('app', 'Пользователь'),
            'text' => \Yii::t('app', 'Текст вопроса'),
            'answer' => \Yii::t('app', 'Ответ'),
            'published' => \Yii::t('app', 'Опубликовано')
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}