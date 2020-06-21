<?php

namespace common\models\literature;

use common\enums\LiteratureEnum;
use common\models\Literature;

class Book extends Literature
{
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->type = LiteratureEnum::TYPE_BOOK;
    }

    public function getRecordTemplate()
    {
        return '@common/views/literature/_book';
    }
}