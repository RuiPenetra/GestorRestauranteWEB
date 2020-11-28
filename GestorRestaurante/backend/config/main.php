<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
/*
        'urlManager' => [
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'rules' => [
                'users' => 'user/index',
                'pedidos' => 'pedido/index',
                'pedido/criar2passo/<tipo:\d+>' => 'pedido/criar2passo',
                'pedido/criar2passo/' => 'pedido/criar2passo',
                [
                    'pattern' => 'pedido/criar2passo/<id:\d+>/<tag>',
                    'route' => 'pedido/criar2passo',
                    'defaults' => ['id' => 0, 'tag' => ''],
                ],
            ],
        ],*/

        'urlManagerFrontend' => [
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'http://localhost/GestorRestauranteWeb/GestorRestaurante/frontend/web/index.php',
        ],

    ],
    'params' => $params,
];
