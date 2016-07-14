<?php

$params = require(__DIR__ . '/params.php');

$controlermap = require (__DIR__.'/controllermap.php');


$config = [
    
    //一个应用中，至少要配置2个属性: yii\base\Application::id 和 yii\base\Application::basePath
    'id' => 'basic',    //id 属性用来区分其他应用的唯一标识ID。 主要给程序使用。为了方便协作，最好使用数字作为应用主体ID， 但不强制要求为数字
    'basePath' => dirname(__DIR__),
    //print_r(dirname(__DIR__));
    //      /vagrant/yii
    
    
    //指定启动阶段需要运行的组件,在启动阶段，每个组件都会实例化
    //启动太多的组件会降低系统性能， 因为每次请求都需要重新运行启动组件，因此谨慎配置启动组件
    'bootstrap' => [
        //引导启动组件,将 log 组件 ID 加入引导让它始终载
        //其他组件不在这里定义的话,只有在访问的时候才会被实例化\Yii::$app->componentID
        'log'
        
    ],     
    
    
    //最重要的属性，它允许你注册多个在其他地方使用的应用组件
    'components' => [
        
        //每一个应用组件指定一个key-value对的数组，key代表组件ID， value代表组件类名或 配置
        //在应用中可以任意注册组件， 并可以通过表达式 \Yii::$app->ComponentID 全局访问
        //只有在访问的时候才会被实例化,第一次实例化,以后直接用不会再重新生成对象
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '233333333333333333',
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
        /* 'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1','10.20.50.222', '192.168.0.*', '192.168.178.20'] // 按需调整这里
        ], */
        'db' => require(__DIR__ . '/db.php'),
        

    ],
    
    
    
    'controllerMap' => $controlermap,
    
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
    /* $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ]; */
}

return $config;
