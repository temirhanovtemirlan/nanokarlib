<?php

namespace common\filters;

use common\components\Filter;
use common\enums\CategoriesEnum;
use common\models\Category;

class CategoryFilter extends Filter
{
    public function menuItems()
    {
        $this->query->where(['published' => true])->andWhere(['type' => CategoriesEnum::TYPE_MENU])->with(['children']);

        return $this;
    }

    public function init()
    {
        parent::init();
        $this->query = Category::find();
        $this->query->orderBy('ts DESC');
    }
}