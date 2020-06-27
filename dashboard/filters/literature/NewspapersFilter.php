<?php

namespace dashboard\filters\literature;

use common\models\literature\Newspaper;
use dashboard\components\Filter;

class NewspapersFilter extends Filter
{
    public static function tableName()
    {
        return 'literature';
    }

    public function getModel()
    {
        return new Newspaper();
    }
}