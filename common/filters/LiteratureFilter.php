<?php

namespace common\filters;

use common\components\Filter;
use common\models\Literature;

class LiteratureFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = Literature::find();
        $this->query->orderBy('ts DESC');
    }
}