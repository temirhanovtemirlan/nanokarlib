<?php

namespace common\filters;

use common\components\Filter;
use common\models\SmartSpace;

class SmartSpaceFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = SmartSpace::find();
        $this->query->orderBy('ts DESC');
    }
}