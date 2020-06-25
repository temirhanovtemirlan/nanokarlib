<?php

namespace archive\filters;

use common\enums\LiteratureEnum;
use common\models\Literature;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class MagazinesFilter extends Model
{
    public $title;
    public $from;
    public $to;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->to = date('d.m.Y H:i:s');
    }

    public function rules()
    {
        return [
            [['title', 'from', 'to'], 'safe']
        ];
    }

    public function search($params)
    {
        $this->load($params);

        $query = Literature::find()
            ->where(['type' => LiteratureEnum::TYPE_MAGAZINE])
            ->andWhere(['published' => true])
            ->with(['views', 'downloads', 'image', 'source']);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        if ($this->title) {
            $query->andFilterWhere(['ilike', 'title', $this->title]);
        }

        if ($this->from && $this->to) {
            $query->andFilterWhere(['between', 'publish_date', $this->from, $this->to]);
        }

        return $provider;
    }
}