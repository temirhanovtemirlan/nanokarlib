<?php

namespace common\models\literature;

use common\enums\LiteratureEnum;
use common\models\Literature;

class Newspaper extends Literature
{
    public function init()
    {
        parent::init();
        $this->type = LiteratureEnum::TYPE_NEWSPAPER;
    }

    public function getRecordTemplate()
    {
        return '@common/views/literature/_newspaper';
    }
    
    public function getPublishDateForInput()
    {
        return date('Y-m-d', strtotime($this->publish_date));
    }
}