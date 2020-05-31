<?php

namespace library\widgets;

use common\services\CategoryService;
use yii\bootstrap4\Widget;

class Menu extends Widget
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function run()
    {
        return $this->render('menu', [
            'items' => $this->categoryService->getFilter()->menuItems()->getModels()
        ]);
    }

    public function init()
    {
        parent::init();
        $this->categoryService = \Yii::$app->categoryService;
    }
}