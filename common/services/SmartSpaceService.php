<?php

namespace common\services;

use common\components\Service;

class SmartSpaceService extends Service
{
    public function getFilter()
    {
        $filter = parent::getFilter();
        $filter->query->with(['attachment']);

        return $filter;
    }

    public function getPublishedSmartSpaces()
    {
        return $this->getFilter()->queryWhere(['published' => true]);
    }
}