<?php

namespace library\widgets;

use common\services\SettingService;
use yii\bootstrap4\Widget;

class Map extends Widget
{
    /**
     * @var SettingService
     */
    private $settingService;

    public function run()
    {
        return $this->render('map', [
            'latitude' => $this->settingService->getLibraryMapHeight(),
            'longitude' => $this->settingService->getLibraryMapWidth(),
        ]);
    }

    public function init()
    {
        parent::init();
        $this->settingService = \Yii::$app->settingService;
    }
}