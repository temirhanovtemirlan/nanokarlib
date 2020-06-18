<?php

namespace archive\widgets;

use yii\bootstrap4\Widget;

class Navigation extends Widget
{
    public function run()
    {
        return $this->render('navigation', [
            'logo' => \Yii::$app->attachmentService->getLibraryLogo(),
            'socialLinks' => \Yii::$app->settingService->getSocialLinks(),
        ]);
    }
}