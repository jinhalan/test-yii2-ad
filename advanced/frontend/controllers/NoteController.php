<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/9/2
 * Time: 11:14
 */
namespace frontend\controllers;

use yii\web\Controller;

class NoteController extends Controller
{
	public function actionIndex()
	{
		echo '<h3>人法地，地法天，天法道，道法自然</h3>';
		echo '<h3>http请求：客户端-TCP-服务器</h3>';
		echo '<h3>php异步调用：AJAX、img标签</h3>';
		echo '<h3>curl CURLOPT_POSTFIELDS：字符串或数组，post文件必须用数组</h3>';
	}
}