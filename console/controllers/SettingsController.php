<?php

namespace console\controllers;

use common\enums\LanguagesEnum;
use common\enums\SettingsEnum;
use common\models\Setting;

class SettingsController extends \yii\console\Controller
{
    public function actionIndex()
    {
        Setting::deleteAll();
        $types = SettingsEnum::labels();
        $languages = LanguagesEnum::labels();
        $languages = array_keys($languages);
        $multilingualTypes = [
            SettingsEnum::LIBRARY_BRAND_LABEL,
            SettingsEnum::LIBRARY_CONTACTS_ADDRESS,
        ];
        foreach ($types as $key => $type) {
            if (in_array($key, $multilingualTypes)) {
                foreach ($languages as $language){
                    $setting = new Setting([
                        'type' => $key,
                        'language' => $language,
                        'content' => 'Настройте это',
                    ]);
                    $setting->save(false);
                    continue;
                }
            } else {
                $setting = new Setting([
                    'type' => $key,
                    'language' => 'all',
                    'content' => 'Настройте это',
                ]);
                $setting->save();
            }
        }

        echo 'Done';
    }
}