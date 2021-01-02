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
        'css/skins.css',
//        'css/cardExpanded.css',

    ];
    public $js = [
        'js/adminlte.js',
        'js/card.js',
        'js/bootstrap.bundle.js',
        'js/tools.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yidas\yii\fontawesome\FontawesomeAsset',
        'rmrevin\yii\ionicon\AssetBundle',
    ];
}
