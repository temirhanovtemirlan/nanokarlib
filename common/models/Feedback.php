<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class Feedback
 * @package common\models
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property string $message
 * @property boolean $published
 * @property string $ts
 */
class Feedback extends ActiveRecord
{
    public static function tableName()
    {
        return 'feedbacks';
    }

    public function rules()
    {
        return [
            ['user_id', 'required'],
            [['full_name', 'message'], 'string'],
            ['full_name', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить ФИО')],
            ['message', 'required', 'message' => \Yii::t('app', 'Необходимо заполнить текст отзыва')],
            ['published', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => \Yii::t('app', 'ID пользователя'),
            'full_name' => \Yii::t('app', 'ФИО'),
            'message' => \Yii::t('app', 'Текст отзыва'),
            'published' => \Yii::t('app', 'Опубликовано'),
        ];
    }

    public function getUser()
    {
        return User::findOne($this->user_id)->username;
    }
}