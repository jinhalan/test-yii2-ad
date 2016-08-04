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
    'bootstrap' => ['log','module1'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
	        'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'enablePrettyUrl' => true,//两种路由模式
            'showScriptName' => false,
	        //'enableStrictParsing' => true,//严格解析路由
	        //'suffix' => '.html',//后缀名
            'rules' => [
            	//'test' => 'test/index',
	            //'POST,PUT test/<id:\d+>' => 'test/create',//HTTP Methods
            	//'test/<id:\d+>' => 'test/view',//声明方式1（pattern-route pair）
	            //['pattern' => 'test/<id:\d+>', 'route' => 'test/view', 'suffix' => '.html'],//声明方式2（pattern-route pairs）
				//'<controller:(test|test2)>/<id:\d+>/<action:(view)>/<tag>' => '<controller>/<action>',//参数路由
	            /*[
	            	'pattern' => '<controller:test>/<id:\d+>/<action:view>/<tag>',
		            'route' => '<controller>/<action>',
		            'defaults' => ['id' => 1, 'tag' =>'']//默认值
	            ]*/
	            //'module1/test/<id:\d+>' => 'module1/test/view',//有模块的路由
            ],
        ],
    ],
	'modules' => [
		'module1' => [
			'class' => 'frontend\module\module1\Module',
			'defaultRoute' => 'test/index',//模块默认路由
		],
	],
	//'defaultRoute' => 'main/index',//缺省路由
	//'catchAll' => ['test/index'],//全拦截路由
    'params' => $params,
];
