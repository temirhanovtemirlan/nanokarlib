<?php

namespace common\services;

use common\components\Service;
use common\enums\LanguagesEnum;
use common\enums\SettingsEnum;
use yii\caching\FileCache;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class SettingService extends Service
{
    /**
     * @return array[]
     */
    public function getLanguagesSettings()
    {
        $languages = [
            'ru' => ['label' => LanguagesEnum::label('ru'), 'url' => Url::current(['language' => 'ru'])],
            'kk' => ['label' => LanguagesEnum::label('kk'), 'url' => Url::current(['language' => 'kk'])],
            'en' => ['label' => LanguagesEnum::label('en'), 'url' => Url::current(['language' => 'en'])],
        ];

        unset($languages[\Yii::$app->language]);

        return array_values($languages);
    }

    public function getLibraryBrandLabel()
    {
        return $this->find()->where(['type' => SettingsEnum::LIBRARY_BRAND_LABEL])->andWhere(['language' => \Yii::$app->language])->one()->content;
    }

    public function getMapSettings()
    {
        $settings = $this->find()->where([
            'in', 'type', [
                SettingsEnum::LIBRARY_MAP_LATITUDE,
                SettingsEnum::LIBRARY_MAP_LONGITUDE,
                SettingsEnum::LIBRARY_CONTACTS_ADDRESS,
                SettingsEnum::LIBRARY_CONTACTS_EMAIL,
                SettingsEnum::LIBRARY_CONTACTS_PHONE
            ]
        ])->andWhere([
            'in', 'language', ['all', \Yii::$app->language]
        ])->all();

        return ArrayHelper::map($settings, 'type', 'content');
    }

    public function getLibrarySettings()
    {
        $settings = [
            SettingsEnum::LIBRARY_BRAND_LABEL,
            SettingsEnum::LIBRARY_SPACE_INFO,
            SettingsEnum::LIBRARY_FOND_INFO
        ];
        return ArrayHelper::map(
            $this->find()
                ->where(['in', 'type', $settings])
                ->andWhere(['in', 'language', [
                    LanguagesEnum::LANGUAGE_ALL,
                    \Yii::$app->language
                ]])
                ->all(),
            'type',
            'content'
        );
    }

    public function getSocialLinks()
    {
        return $this->find()->where(['in', 'type', array_keys(SettingsEnum::socialLinks())])->all();
    }
}