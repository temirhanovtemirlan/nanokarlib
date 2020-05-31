<?php

namespace common\filters;

use common\components\Filter;
use common\models\Attachment;

class AttachmentFilter extends Filter
{
    public function init()
    {
        parent::init();
        $this->query = Attachment::find();
        $this->query->orderBy('ts DESC');
    }
}