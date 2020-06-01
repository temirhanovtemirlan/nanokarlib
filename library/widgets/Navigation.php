<?php

namespace library\widgets;

use common\services\AttachmentService;
use common\services\CategoryService;
use common\services\SettingService;
use yii\bootstrap4\Widget;

class Navigation extends Widget
{
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * @var AttachmentService
     */
    private $attachmentService;

    /**
     * @var CategoryService
     */
    private $categoryService;

    public function run()
    {
        $data = [
            'logo' => $this->attachmentService->getLibraryLogo(),
            'brandLabel' => $this->settingService->getLibraryBrandLabel(),
            'languages' => $this->settingService->getLanguagesSettings(),
            'menuItems' => $this->categoryService->getMenuItems(),
        ];
        return $this->render('navigation', $data);
    }

    public function init()
    {
        parent::init();
        $this->settingService = \Yii::$app->settingService;
        $this->attachmentService = \Yii::$app->attachmentService;
        $this->categoryService = \Yii::$app->categoryService;
    }
}