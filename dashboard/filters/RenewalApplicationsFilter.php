<?php

namespace dashboard\filters;

use common\models\RenewalApplication;

class RenewalApplicationsFilter extends \dashboard\components\Filter
{
    public static function tableName()
    {
        return 'renewal_applications';
    }

    public function getModel()
    {
        return new RenewalApplication();
    }
}