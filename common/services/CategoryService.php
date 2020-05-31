<?php

namespace common\services;

use common\components\ActiveRecord;
use common\components\Service;
use common\enums\CategoriesEnum;

class CategoryService extends Service
{
    public function save(ActiveRecord $model)
    {
        $model->parent_id = (int) $model->parent_id;
        return parent::save($model);
    }
}