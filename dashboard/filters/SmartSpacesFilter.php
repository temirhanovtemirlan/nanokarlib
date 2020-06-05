<?php

namespace dashboard\filters;

use common\models\SmartSpace;
use dashboard\components\Filter;

class SmartSpacesFilter extends Filter
{
    public static function tableName()
    {
        return 'smart_spaces';
    }

    public function getModel()
    {
        return new SmartSpace();
    }
}