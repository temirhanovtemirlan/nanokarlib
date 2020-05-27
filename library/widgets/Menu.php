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
        $parents = $this->categoryService->getParentCategories();
        $children = $this->categoryService->getChildCategories();

        return $this->render('menu', [
            'parents' => $parents,
            'children' => $children,
        ]);
    }

    public function init()
    {
        parent::init();
        $this->categoryService = \Yii::$app->categoryService;
    }
}