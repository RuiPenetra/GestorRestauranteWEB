<?php

namespace frontend\assets;

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
        'css/login.css',
        'css/signup.css',
        'css/adminlte.css',
        'css/cardExpanded.css',

    ];
    public $js = [
        'js/adminlte.js',
        'js/card.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yidas\yii\fontawesome\FontawesomeAsset',
    ];
}
