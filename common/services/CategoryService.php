<?php

namespace common\services;

use common\components\ActiveRecord;
use common\components\Service;
use common\enums\CategoriesEnum;
use common\models\Category;

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

    public function getAdditionalSections()
    {
        return $this->getFilter()->search([
            'published' => true,
            'type' => CategoriesEnum::TYPE_ADDITIONAL
        ]);
    }

    /**
     * @param $url
     * @return array|\yii\db\ActiveRecord|null|Category
     */
    public function getSectionByUrl($url)
    {
        return $this->find()->where(['published' => true])
            ->andWhere(['url_kk' => $url])
            ->orWhere(['url_ru' => $url])
            ->orWhere(['url_en' => $url])
            ->one();
    }
}