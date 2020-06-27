<?php

namespace dashboard\filters\literature;

use common\models\literature\Book;
use dashboard\components\Filter;

class BooksFilter extends Filter
{
    public static function tableName()
    {
        return 'literature';
    }

    public function getModel()
    {
        return new Book();
    }
}