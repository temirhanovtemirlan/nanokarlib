<?php

namespace dashboard\controllers\literature;

use common\models\literature\Book;
use dashboard\controllers\LiteratureController;
use dashboard\filters\literature\BooksFilter;

class BooksController extends LiteratureController
{
    public function getModel()
    {
        return new Book();
    }

    public function getFilter()
    {
        return new BooksFilter();
    }
}