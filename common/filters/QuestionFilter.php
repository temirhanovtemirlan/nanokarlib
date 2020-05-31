<?php

namespace common\filters;

use common\components\Filter;
use common\models\Question;

class QuestionFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = Question::find();
        $this->query->orderBy('ts DESC');
    }
}