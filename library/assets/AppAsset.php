<?php

namespace library\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css',
        'libs/libraries.min.css'
    ];
    public $js = [
        'libs/libraries.min.js',
        'scripts/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
