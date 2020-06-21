<?php

namespace dashboard\controllers\literature;

use common\models\literature\Newspaper;
use dashboard\controllers\LiteratureController;
use dashboard\filters\literature\NewspapersFilter;

class NewspapersController extends LiteratureController
{
    public function getModel()
    {
        return new Newspaper();
    }

    public function getFilter()
    {
        return new NewspapersFilter();
    }
}