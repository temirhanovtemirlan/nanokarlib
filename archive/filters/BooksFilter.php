<?php

namespace archive\filters;

use common\enums\LiteratureEnum;
use common\models\Literature;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class BooksFilter extends Model
{
    public $title;
    public $sort;

    const SORT_BY_RECOMMENDED = 1;
    const SORT_BY_POPULAR = 2;
    const SORT_BY_NEW = 3;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->sort = self::SORT_BY_RECOMMENDED;
    }

    public function rules()
    {
        return [
            [['title'], 'safe'],
            [['sort'], 'integer']
        ];
    }

    public function search($params)
    {
        $this->load($params);
        $query = Literature::find()
            ->where(['type' => LiteratureEnum::TYPE_BOOK])
            ->andWhere(['published' => true])
            ->with(['views', 'downloads', 'image', 'source']);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        if ($this->title) {
            $query->andFilterWhere(['ilike', 'title', $this->title])
                ->orFilterWhere(['ilike', 'description_'.\Yii::$app->language, $this->title]);
        }

        switch ($this->sort) {
            case self::SORT_BY_RECOMMENDED:
                $query->orderBy(['recommended' => SORT_DESC]);
                break;
            case self::SORT_BY_POPULAR:
                $query->orderBy(['COUNT(views.id)' => SORT_DESC]);
                break;
            case self::SORT_BY_NEW:
                $query->orderBy([
                    'ts' => SORT_DESC,
                    'latest' => SORT_DESC
                ]);
                break;
        }

        return $provider;
    }
}