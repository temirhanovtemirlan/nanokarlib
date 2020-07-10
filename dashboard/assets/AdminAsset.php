<?php

namespace dashboard\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'libs/scripts/demo.min.js',
        'libs/scripts/mousewheel.min.js',
        'libs/scripts/dashboard.min.js',
        'libs/scripts/chart.min.js',
        'libs/scripts/mapael/mapael.min.js',
        'libs/scripts/mapael/usa_states.min.js'
    ];
    public $depends = [
        'dashboard\assets\AppAsset'
    ];
}