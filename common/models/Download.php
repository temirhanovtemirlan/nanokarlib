<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class Download
 * @package common\models
 * @property int $id
 * @property int $user_id
 * @property string $session_id
 * @property int $literature_id
 * @property string $ts
 */
class Download extends ActiveRecord
{
    public static function tableName()
    {
        return 'downloads';
    }
}