<?php

namespace dashboard\controllers\literature;

use common\models\literature\Magazine;
use dashboard\controllers\LiteratureController;
use dashboard\filters\literature\MagazinesFilter;

class MagazinesController extends LiteratureController
{
    public function getModel()
    {
        return new Magazine();
    }

    public function getFilter()
    {
        return new MagazinesFilter();
    }
}