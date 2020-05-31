<?php

namespace common\filters;

use common\components\Filter;
use common\models\RenewalApplication;

class RenewalApplicationFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = RenewalApplication::find();
        $this->query->orderBy('ts DESC');
    }
}