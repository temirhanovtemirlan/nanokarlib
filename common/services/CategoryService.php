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

    public function getMenuItems()
    {
        return $this->find()
            ->where(['published' => true])
            ->andWhere(['type' => CategoriesEnum::TYPE_MENU])
            ->andWhere(['parent_id' => 0])
            ->with(['children'])
            ->all();
    }
}