<?php

namespace dashboard\filters;

use common\models\Publication;
use dashboard\components\Filter;

class PublicationsFilter extends Filter
{
    public static function tableName()
    {
        return 'publications';
    }

    public function getModel()
    {
        return new Publication();
    }
}