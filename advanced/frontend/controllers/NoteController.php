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
		echo '<h3>Pjax：点击a标签时，ajax获取返回结果，更新id为main的div内的内容，更新url地址（pushstate支持）</h3>';
		echo '<h3>Pjax（后台）：接收pjax请求，判断header是否HTTP_X_PJAX，返回相应的内容</h3>';
	}
}