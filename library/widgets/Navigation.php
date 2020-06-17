<?php

namespace library\widgets;

use yii\bootstrap4\Widget;

class Navigation extends Widget
{
    public function run()
    {
        return $this->render('navigation', [
            'logo' => \Yii::$app->attachmentService->getLibraryLogo(),
            'brandLabel' => \Yii::$app->settingService->getLibraryBrandLabel(),
            'languages' => \Yii::$app->settingService->getLanguagesSettings(),
            'menuItems' => \Yii::$app->categoryService->getMenuItems(),
            'socialLinks' => \Yii::$app->settingService->getSocialLinks(),
        ]);
    }
}