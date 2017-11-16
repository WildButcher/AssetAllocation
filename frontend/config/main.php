<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
	require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'defaultRoute'=>'allocation/index',
	'language'=>'zh-CN',
    'components' => [
        'request' => [
            'csrfParam' => '_adviserCSRF',
        	'cookieValidationKey'=>'woeifjlkdfjpowu343243241k',
        ],
        'user' => [
            'identityClass' => 'common\models\Adviser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'frontendsession',
        	'savePath' => sys_get_temp_dir(),
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
            	'enablePrettyUrl' => true,
        		'showScriptName' => false,
        		'suffix'=>'.jsp',
        		'rules' => [
        				'<controller:\w+>/<id:\d+>' => '<controller>/detail',
        				'<controller:\w+>/<id:\d+>/<action:(create|update|delete|view|privilege)>'=>'<controller>/<action>',
        				'login' => 'site/login',
        				'signup' => 'site/signup',
        				'<controller:\w+>/<id:\d+>' => '',
        		],
        ],
    ],
    'params' => $params,

];
