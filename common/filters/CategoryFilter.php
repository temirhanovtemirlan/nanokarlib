<?php

namespace common\filters;

use common\components\Filter;
use common\enums\CategoriesEnum;

class CategoryFilter extends Filter
{
    public function menuChildren()
    {
        return $this->queryWhere(['IS NOT', 'parent_id', null])->queryWhere(['type' => CategoriesEnum::TYPE_MENU]);
    }

    public function menuParents()
    {
        return $this->search(['parent_id' => null, 'type' => CategoriesEnum::TYPE_MENU]);
    }
}