<?php

namespace dashboard\filters;

use common\models\Category;

class CategoriesFilter extends \dashboard\components\Filter
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getModel()
    {
        return new Category();
    }
}