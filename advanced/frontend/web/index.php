<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);//定义环境常量
defined('YII_ENV') or define('YII_ENV', 'dev');
//defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER', false);

require(__DIR__ . '/../../vendor/autoload.php');//注册composer自动加载器
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');//注册Yii自动加载器，优先响应
require(__DIR__ . '/../../common/config/bootstrap.php');//设置别名
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(//应用配置
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

$application = new yii\web\Application($config);
$application->run();
