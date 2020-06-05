<?php

namespace dashboard\filters;

use common\models\Feedback;

class FeedbacksFilter extends \dashboard\components\Filter
{
    public static function tableName()
    {
        return 'feedbacks';
    }

    public function getModel()
    {
        return new Feedback();
    }
}