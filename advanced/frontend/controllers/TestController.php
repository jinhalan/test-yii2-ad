<?php
namespace frontend\controllers;

use Yii;
use yii\base\ErrorException;
use yii\web\Controller;

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

	public function actionRequest()
	{
		echo '<h3>request-天下皆知美之为美，斯恶矣。皆知善之为善，斯不善矣。</h3>';

		$request = Yii::$app->request;//请求组件（yii\web\Request类实例）

		$params = $request->bodyParams;//请求参数、请求体

		$method = $request->getMethod();//请求方法

		$absoluteUrl = $request->getAbsoluteUrl();//请求URLs

		$userAgent = $request->getUserAgent();//请求头$headers = $request->getHeaders();

		var_dump($method,$absoluteUrl,$userAgent,$params);
	}

	public function actionResponse()
	{
		//echo '<h3>response-有无相生，难易相成，长短相较，高下相倾，声音相和，前后相随。</h3>';
		date_default_timezone_set('GMT');//时区

		//构建响应和发送给终端用户
		$response = Yii::$app->response;//响应组件（yii\web\Response）

		//throw new \yii\web\NotFoundHttpException('Page not found.');//抛出异常
		//throw new \yii\web\httpException(402, 'Payment Required');

		$headers = $response->getHeaders();//HTTP头部

		$headers->add('Cache-Control', 'max-age=100');//设置HTTP头部
		$headers->set('Pragma', 'public, max-age=100');
		//$values = $headers->remove('Pragma');

		//session_cache_limiter('public');//session_start()默认缓存控制器为nocache

		//$time = new \DateTime('2016-08-05 11:15:00', new \DateTimeZone('GMT'));
		//$formatTime = $time->format("D, d M Y H:i:s T");//格式化时间

		//响应主体
		//$response->content = '圣人处无为之事，行不言之教';//==echo 'xxx';
		//$response->format = \yii\web\Response::FORMAT_JSON;//指定格式器（默认FORMAT_HTML）
		//$response->data = ['message' => 'hello world'];//指定数据内容

		//浏览器跳转（设置Location HTTP头）
		//return $this->redirect('http://test.com', 301);//默认302资源临时放在xxx，301永久

		//发送文件
		//return $response->sendFile('robots.txt');//>= sendStreamAsFile();
		//return $response->sendContentAsFile('圣人处无为之事，行不言之教', 'r.txt');
		//$headers->add('Content-Disposition', 'attachment;filename=apache.jpg');//实现关键
		//$file = 'apache.jpg';
		//$response->xSendFile($file);//web应用在服务器发送文件前结束

		//发送响应
		//$response->send();//默认在yii\base\Application::run()结尾自动调用

		//return ['message' => 'hello world'];
		return $this->render('response');//添加Pragma:no-cache
	}

	public function actionSession()
	{
		echo '<h3>session-生而不有，为而不恃，功成而弗居。夫唯弗居，是以不去。</h3>';

		$session = Yii::$app->session;//session组件（yii\web\session）

		//$session->open();

		//session存储
		//文件，数据表，缓存，redis，MongoDB

		//Flash数据
		//$session->setFlash('postDeleted', 'You have successfully deleted your post');
		//echo $session->getFlash('postDeleted');
		//$result = $session->hasFlash('postDeleted');
		//var_dump($result);

		/*Yii::$app->response->cookies->add(new \yii\web\Cookie([
			'name' => 'language',
			'value' => 'zh-CN',
		]));*/
		//setcookie('language', 'zh-CN');
		//$cookies = Yii::$app->request->cookies;
		//var_dump($cookies,$_COOKIE);

	}

	//使用错误操作
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionShowError()
	{
		echo '<h3>error-上善若水，水善利万物而不争，处众人之所恶，故几于道</h3>';

		//错误处理器（yii\web\errorHandler默认启用）：非致命->异常，显示函数调用栈

		try {
			10/0;
		} catch (ErrorException $e) {//使用错误处理器
			echo $e->getMessage();
		}
		//echo $A;//notice
		//10/0;//warning
	}
	//public function actionError(){};//致命错误

	public function actionLog()
	{
		Yii::beginProfile('block1');

		echo '<h3>log-金玉满堂，莫能之守</h3>';

		$message = ['log1' => '金玉满堂，莫能之守'];

		//日志消息：消息过滤，跟中级别，格式化，刷新导出（yii\log\Logger）
		//Yii::trace('start calculating average revenue', __METHOD__);
		//Yii::error($message);

		//日志目标：数据库，邮箱，文件，系统日志

		Yii::endProfile('block1');
	}
}
//class TestController {}//编译错误Compile Error