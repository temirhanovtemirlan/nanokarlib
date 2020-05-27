<?php

namespace library\widgets;

use common\enums\SettingsEnum;
use common\services\SettingService;
use yii\bootstrap4\Widget;

class SocialLinks extends Widget
{
    /**
     * @var SettingService
     */
    private $settingService;

    public function run()
    {
        return $this->render('social-links', [
            'dataProvider' => $this->settingService->getFilter()->search(['in', 'type', SettingsEnum::socialLinks()]),
        ]);
    }
}