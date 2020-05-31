<?php

namespace common\components;

use yii\data\ActiveDataProvider;

class Filter extends ActiveDataProvider
{
    public function queryWhere($query, $condition = 'and')
    {
        if ($condition == 'and') {
            $this->query->andWhere($query);
        } else {
            $this->query->orWhere($query);
        }

        return $this;
    }

    public function search($params)
    {
        foreach ($params as $attribute => $value) {
            $this->query->andFilterWhere(['like', $attribute, $value]);
        }

        return $this;
    }

    public function init()
    {
        parent::init();
        $this->sort = false;
    }
}