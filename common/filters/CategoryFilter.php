<?php

namespace common\filters;

use common\components\Filter;
use common\enums\CategoriesEnum;

class CategoryFilter extends Filter
{
    public function menuItems()
    {
        $this->query->where(['published' => true])->andWhere(['type' => CategoriesEnum::TYPE_MENU])->with(['children']);

        return $this;
    }
}