<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/7/28
 * Time: 16:26
 */
class TestController extends Controller
{
	public function actionIndex()
	{
		//Yii::error('log test:见龙在田');

		echo '<h3>index-道可道，非常道；名可名，非常名</h3>';
	}

	public function actionView()
	{
		echo '<h3>view-无名万物之始，有名万物之母</h3>';

		var_dump($_GET);
	}

	public function actionCreate()
	{
		echo '<h3>create-故常无欲以观其妙，有欲以观其徼</h3>';

		var_dump($_GET);
	}
}