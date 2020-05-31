<?php

namespace common\filters;

use common\components\Filter;
use common\enums\SettingsEnum;
use common\models\Setting;

class SettingFilter extends Filter
{
    public function getLibraryInfoForAuthBlock()
    {
        $this->query->orderBy('id DESC');
        return $this->queryWhere(['in', 'type', [SettingsEnum::LIBRARY_SPACE_INFO, SettingsEnum::LIBRARY_FOND_INFO]]);
    }

    public function init()
    {
        parent::init();
        $this->query = Setting::find()->orderBy('ts DESC');
    }
}