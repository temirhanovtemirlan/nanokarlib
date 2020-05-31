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
     * @var FileCache
     */
    private $cache;

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

    public function getLibrarySpaceInfo()
    {
        return $this->find()->where(['type' => SettingsEnum::LIBRARY_SPACE_INFO])->one()->content;
    }

    public function getLibraryFondInfo()
    {
        return $this->find()->where(['type' => SettingsEnum::LIBRARY_FOND_INFO])->one()->content;
    }

    public function getLibraryMapHeight()
    {
        return (float) $this->find()->where(['type' => SettingsEnum::LIBRARY_MAP_HEIGHT])->one()->content;
    }

    public function getLibraryMapWidth()
    {
        return (float) $this->find()->where(['type' => SettingsEnum::LIBRARY_MAP_WIDTH])->one()->content;
    }

    public function getLibrarySettings()
    {
        $settings = [
            SettingsEnum::LIBRARY_BRAND_LABEL,
            SettingsEnum::LIBRARY_SPACE_INFO,
            SettingsEnum::LIBRARY_FOND_INFO,
            SettingsEnum::LIBRARY_MAP_LATITUDE,
            SettingsEnum::LIBRARY_MAP_LONGITUDE
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

    public function init()
    {
        parent::init();
        $this->cache = \Yii::$app->cache;
    }
}