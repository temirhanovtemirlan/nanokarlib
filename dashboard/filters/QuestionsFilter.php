<?php

namespace dashboard\filters;

use common\models\Question;

class QuestionsFilter extends \dashboard\components\Filter
{
    public static function tableName()
    {
        return 'questions';
    }

    public function getModel()
    {
        return new Question();
    }
}