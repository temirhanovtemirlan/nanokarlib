<?php

namespace common\models;

use common\components\ActiveRecord;
use common\enums\LanguagesEnum;
use common\enums\SettingsEnum;

/**
 * Class Setting
 * @package common\models
 * @property int $id
 * @property int $type
 * @property string $language
 * @property string $content
 * @property string $ts
 */
class Setting extends ActiveRecord
{
    public static function tableName()
    {
        return 'settings';
    }

    public function rules()
    {
        return [
            [['type'], 'integer'],
            ['type', 'in', 'range' => array_keys(SettingsEnum::labels())],
            [['language', 'content'], 'required'],
            ['language', 'in', 'range' => ['ru', 'en', 'kk', 'all']],
        ];
    }
}