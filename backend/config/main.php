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
    'modules' => [
        // 模块
        'api' => [
            'class' => 'backend\modules\api\ApiModule',
            // 模块内的配置
            'components' => [
                'response' => [
                    // 无效配置
                    'class' => \yii\web\Response::className(),
                    'format' => yii\web\Response::FORMAT_JSON,
                    'charset' => 'UTF-8',
                    'statusCode' => 404,
                    // ...
                ],

            ],
        ]
    ],
    'language' => 'zh-CN',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\components\user\identity\User',
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
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [

            ],
        ],

    ],
    // 修改默认的布局配置文件
    'layout' => 'gentelella',   // 注意配置数组深度层次
    'params' => $params,
    'homeUrl' => 'index.php/?r=index/index', // 设置主页
];
