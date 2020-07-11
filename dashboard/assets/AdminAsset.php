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
        'scripts/mousewheel.min.js',
        'scripts/raphael.min.js',
        'scripts/mapael/mapael.min.js',
        'scripts/mapael/usa_states.min.js'
    ];
    public $depends = [
        'dashboard\assets\AppAsset'
    ];
}