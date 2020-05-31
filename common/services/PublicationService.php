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
}