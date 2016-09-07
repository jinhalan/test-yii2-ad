<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/9/5
 * Time: 16:49
 */
namespace console\controllers;

use yii\console\Controller;

class TestController extends Controller
{
	public function actionSay()
	{
		sleep(10);
		file_put_contents('test.txt', '人法地，地法天，天法道，道法自然');
		//echo 'good';
	}
}