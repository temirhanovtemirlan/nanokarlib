<?php

namespace common\models;

use common\components\ActiveRecord;

/**
 * Class View
 * @package common\models
 * @property int $id
 * @property int $user_id
 * @property string $session_id
 * @property int $literature_id
 * @property string $ts
 */
class View extends ActiveRecord
{
    public static function tableName()
    {
        return 'views';
    }
}
