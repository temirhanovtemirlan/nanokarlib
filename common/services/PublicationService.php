<?php

namespace common\services;

use common\components\Service;

class PublicationService extends Service
{
    public function getFilter()
    {
        $filter = parent::getFilter();
        $filter->query->with(['category']);

        return $filter;
    }

    public function getPublicationByCanonicalTitle($canonical_title)
    {
        return $this->find()
            ->where(['published' => true])
            ->andWhere(['canonical_title' => $canonical_title])
            ->with(['category', 'attachments'])
            ->one();
    }

    public function searchByQuery($query)
    {
        if (empty($query)) {
            return $this->getFilter()->search(['published' => true]);
        }
        return $this->getFilter()->queryWhere(['like', 'title', $query])->queryWhere(['like', 'body', $query])->queryWhere(['published' => true]);
    }
}