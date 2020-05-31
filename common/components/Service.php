<?php

namespace common\components;

use common\components\contracts\ServiceInterface;
use common\helpers\DDDHelper;
use Throwable;
use yii\base\Component;
use yii\db\ActiveQuery;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;

/**
 * Class Service
 * @package common\components
 */
abstract class Service extends Component implements ServiceInterface
{
    public function getModel() : ActiveRecord
    {
        $modelClass = DDDHelper::getRelatedClass(get_called_class(), 'models', '');
        return new $modelClass;
    }

    public function getFilter()
    {
        $filterClass = DDDHelper::getRelatedClass(get_called_class(), 'filters', 'Filter');
        $filter = new $filterClass;
        if ($filter instanceof Filter) {

            $filter->query = $this->getModel()::find();
            $filter->query->orderBy('ts DESC');
            $filter->sort = false;
        }

        return $filter;
    }

    /**
     * @param ActiveRecord $model
     * @return bool
     */
    public function save(ActiveRecord $model)
    {
        return $model->save();
    }

    /**
     * @return ActiveQuery
     */
    public function find()
    {
        return $this->getModel()::find();
    }

    /**
     * @param $id
     * @return ActiveRecord|null
     * @throws NotFoundHttpException
     */
    public function findOne($id)
    {
        $model = $this->getModel()::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException(\Yii::t('app', 'Данные не найдены'));
        }

        return $model;
    }

    /**
     * @param ActiveRecord $model
     * @return bool|false|int
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function delete(ActiveRecord $model)
    {
        return $model->delete();
    }
}
