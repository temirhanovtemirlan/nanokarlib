<?php

namespace dashboard\filters;

use common\models\Attachment;
use dashboard\components\Filter;

class AttachmentsFilter extends Filter
{
    public static function tableName()
    {
        return 'attachments';
    }

    public function getModel()
    {
        return new Attachment();
    }
}