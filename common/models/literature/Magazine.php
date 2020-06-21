<?php

namespace common\models\literature;

use common\enums\LiteratureEnum;
use common\models\Literature;

class Magazine extends Literature
{
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->type = LiteratureEnum::TYPE_MAGAZINE;
    }

    public function getRecordTemplate()
    {
        return '@common/views/literature/_magazine';
    }

    public function getPublishDateForInput()
    {
        return date('Y-m-d', strtotime($this->publish_date));
    }
}