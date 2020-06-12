<?php

namespace common\widgets;

use yii\bootstrap4\Widget;

class HtmlLang extends Widget
{
    public function run()
    {
        switch (\Yii::$app->language) {
            case 'ru':
                return 'ru-RU';
            case 'kk':
                return 'kk-KZ';
            case 'en':
                return 'en-US';
            default:
                return '';
        }
    }
}