<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
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
        'js/modal.js',
        'js/bootstrap.bundle.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yidas\yii\fontawesome\FontawesomeAsset',
        'rmrevin\yii\ionicon\AssetBundle',
    ];
}
