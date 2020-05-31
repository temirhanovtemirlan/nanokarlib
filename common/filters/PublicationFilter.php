<?php

namespace common\filters;

use common\components\Filter;
use common\models\Publication;

class PublicationFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = Publication::find();
        $this->query->orderBy('ts DESC');
    }
}