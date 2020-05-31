<?php

namespace common\filters;

use common\components\Filter;
use common\models\Feedback;

class FeedbackFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = Feedback::find();
        $this->query->orderBy('ts DESC');
    }
}