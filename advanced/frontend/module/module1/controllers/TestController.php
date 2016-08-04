<?php
namespace frontend\module\module1\controllers;

use yii\web\Controller;

/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/8/3
 * Time: 14:45
 */
class TestController extends Controller
{
	public function actionIndex()
	{
		echo '<h3>路由：module1/test/index</h3>';
	}

	public function actionView()
	{
		echo '<h3>路由：module1/test/view</h3>';
	}


}