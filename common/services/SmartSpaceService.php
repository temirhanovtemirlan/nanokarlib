<?php

namespace common\services;

use common\components\Service;

class SmartSpaceService extends Service
{
    public function getPublishedSmartSpaces()
    {
        return $this->getFilter()->queryWhere(['published' => true]);
    }
}