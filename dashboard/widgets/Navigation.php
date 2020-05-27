<?php

namespace dashboard\widgets;

use yii\bootstrap4\Widget;

class Navigation extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        return $this->render('navigation');
    }
}