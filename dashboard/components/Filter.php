<?php

namespace dashboard\components;

use common\components\ActiveRecord;
use yii\data\ActiveDataProvider;

class Filter extends ActiveRecord
{
    public function getModel()
    {
        return $this;
    }

    public function rules()
    {
        return [
            [$this->getModel()->attributes(), 'safe']
        ];
    }

    public function count()
    {
        return $this->getModel()::find()->count();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this->getModel()::find();
        $query->orderBy(['ts' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        foreach ($this->attributes() as $attribute) {
            $query->andFilterWhere(['ilike', $attribute, $this->getAttribute($attribute)]);
        }

        return $dataProvider;
    }
}