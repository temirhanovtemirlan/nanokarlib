<?php

namespace dashboard\filters\literature;

use common\models\literature\Magazine;
use dashboard\components\Filter;

class MagazinesFilter extends Filter
{
    public static function tableName()
    {
        return 'literature';
    }

    public function getModel()
    {
        return new Magazine();
    }
}