<?php
use kartik\datecontrol\Module;
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@adminlte/widgets'=>'@vendor/adminlte/yii2-widgets'
    ],
    'modules' => [
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module',
            'autoWidget' => true,
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]]
            ],
         ]
    ],
    //'defaultRoute'=> '/site/login', //ruta de Retrogame index
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '73S9ChPHK0WHTcxZOW1T8-PRvHfIJOXk',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        //url limpias
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //aqui puedo meter personalizacion de url
            ],
        ],
        'formatter' => [

            'dateFormat' => 'dd/MM/yyyy',

            'datetimeFormat' => 'php:d/m/Y',

            'decimalSeparator' => ',',

            'thousandSeparator' => '.',

            'currencyCode' => 'EUR',

        ],

        
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
