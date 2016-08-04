<?php

namespace frontend\module\module1;
use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * module1 module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\module\module1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

	/**
	 * Bootstrap method to be called during application bootstrap stage.
	 * @param Application $app the application currently running
	 */
	public function bootstrap($app)
	{
		$app->getUrlManager()->addRules([
			'module1/test/<id:\d+>' => 'module1/test/view',//有模块的路由
			//'test/<id:\d+>' => 'test/view',//有效--
		], false);
	}
}
