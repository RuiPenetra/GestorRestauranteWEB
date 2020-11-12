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
        'css/alert/toastr.min.css',
        'css/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
        'css/alert/sweetalert2.min.css',

//        'css/cardExpanded.css',
    ];
    public $js = [
        'js/adminlte.js',
//        'js/modal.js',
        'js/bootstrap.bundle.min.js',
        'js/alert/toastr.min.js',
//        'js/jquery/jquery.min.js',
        'js/alert/sweetalert2.min.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yidas\yii\fontawesome\FontawesomeAsset',
        'rmrevin\yii\ionicon\AssetBundle',
    ];
}
