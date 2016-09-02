<?php
namespace frontend\controllers;

use frontend\components\TestBehavior;
use frontend\components\TestEvent;
use frontend\models\TestGetData;
use Yii;
use yii\base\ErrorException;
use yii\db\Connection;
use yii\db\Query;
use yii\web\Controller;
use yii\web\UploadedFile;

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

	public function actionComponent()
	{
		//echo '<h3>功成身退，天之道</h3>';
		//-----------------------------组件---------------------------
		//yii\base\component类或其子类的实例：属性，事件，行为
		//属性：getter，setter//$object->label = trim($label)

		//-----------------------------事件---------------------------
		$event = new TestEvent();//继承yii\base\Component

		//存储匿名函数到变量
		$anonymousFunction = function($event){
			echo '成功触发事件：'.$event->name;
			var_dump($event->data);
			echo '（事件处理器2）<br/>';
		};

		//创建事件，附加事件处理器，传入参数，事件处理器顺序
		$data = '功成身退，天之道';
		$event->on(TestEvent::EVENT_HELLO, function($event){
			echo '成功触发事件：'.$event->name.'（事件处理器1）<br/>';
		});
		$event->on(TestEvent::EVENT_HELLO, $anonymousFunction, $data);

		//移除事件处理器
		//$event->off(TestEvent::EVENT_HELLO, $anonymousFunction);

		//触发事件
		$event->bar();//调用yii\base\component::trigger()

		//类级别事件（见TestEvent）

		//全局事件（不详）

		//-----------------------------行为---------------------------
		//定义行为--附加行为--移除行为
		echo '<br/>通过行为获取属性prop1：'.$this->prop1;
		echo '<br/>通过行为获取属性prop2：'.$this->prop2;
		//通过行为添加组件事件

		//return $this->render('component');
	}
	public function behaviors()
	{
		return [
			TestBehavior::className(),//匿名行为（vs命名行为）
		];
	}

	public function actionConfig()
	{
		echo '<h3>config-有之以为利，无之以为用</h3>';

		//配置--配置格式：class,property,event,behavior--使用配置：createObject()
		//应用--组件--小部件--配置文件--默认配置：在入口脚本Yii::$container->set()

		//别名--定义别名--解析别名（跟别名，衍生别名）--使用别名（配置）--预定义别名--扩展别名

		//类自动加载（composer）
		//获取自动加载类（via静态方法）--实例化自动加载类--初始化或配置加载对象属性（类名-文件路径 映射,PSR-4标准）--注册自动加载函数（根据属性）

		//引导启动（开始解析处理请求前预备环境）
		//注册类文件自动加载器（入口脚本）--加载配置并创建应用主体实例

		//依赖注入容器(container) _definitions,_params,$_singletons
		//--创建一个DI容器
		//--依赖注入（$container->set) 更新_definitions
		//--开始实例化容器内容（$container->get）@1开始
		//--分析类依赖单元（php 反射机制：ReflectionClass）
		//--实例化依赖单元-创建一个引用（$_dependencies）
		//--使用$_dependencies成功实例化容器内容 @1结束
		//**解决依赖、实例化

		Yii::$container->set('test2', 'frontend\controllers\Test2Controller');
		$test2 = Yii::$container->get('test2');
		//var_dump($test2->db);

		//PHP5 的反射机制：通过构造函数分析类所依赖到单元
		/*$reflection = new \ReflectionClass('frontend\controllers\Test2Controller');
		$constructor = $reflection->getConstructor();
		foreach ($constructor->getParameters() as $param) {
			if ($param->isDefaultValueAvailable()) {

			} else {
				$c = $param->getClass();
				var_dump($c);
			}

		}*/

		//服务定位器（yii\di\ServiceLocator 实例：application对象）
		//构建在DI容器之上，通过DI容器获取实例
		//应用的本质：入口脚本？实例化(赋予Yii::$app)--run()...
		var_dump(is_callable('frontend\controllers\Test2Controller', true));

	}

	public function actionDatabase()
	{
		echo '<h3>database-俗人昭昭，我独昏昏，俗人察察，我独闷闷</h3>';

		//数据库连接方式：DAO（数据访问层）
		//创建连接：dsn,username,password,charset
		$db = Yii::$app->db;
		//执行SQL语句
		$count = $db->createCommand('SELECT COUNT(*) FROM user')
					->queryScalar();
		//查询构建器
		$userId = '1 or user_id=2';//sql 注入
		$query = new Query();
		$res1 = $query->select(['user_id', 'user_name'])
			->from(['user'])
			->where(['user_id' => $userId])
			//->createCommand()->sql;
			->all();
		$res2 = $db->createCommand('SELECT * FROM user WHERE user_id='.$userId)->queryAll();
		var_dump($res1,$res2);

		//Active Record 提供了一个面向对象接口
		//数据库迁移
	}

	public function actionGetData()
	{
		$model = new TestGetData();

		//异步调用：
		//popen
		/*$handle = popen('php C:\Users\lanjh\Desktop\www\test-yii2-ad\advanced\frontend\web\test.php', 'r');
		pclose($handle);*/
		//curl
		$url = 'http://test.com/test.php';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		/*$curl_opt = array(CURLOPT_URL, 'http://test.com/test.php',
			CURLOPT_RETURNTRANSFER, 1,
			CURLOPT_TIMEOUT, 10,);
		curl_setopt_array($ch, $curl_opt);*/
		curl_exec($ch);//var_dump(curl_error($ch));exit;
		curl_close($ch);

		//创建表单
		if ($model->load(Yii::$app->request->post(), 'TestGetData')) {print_r($_FILES);exit;
			$model->validate();
			//$model->uploadFile = UploadedFile::getInstanceByName('uploadFile');
			var_dump($model->attributes);exit;
		} else {
			return $this->render('form', [
				'model' => $model,
			]);
		}
		//输入验证：声明验证规则-自定义错误信息-验证事件-条件式验证-数据预处理-临时验证-自定义验证器-推迟验证

		//yii\widget\ActiveForm, yii\helpers\Html
	}

}
//class TestController {}//编译错误Compile Error
class Test2Controller extends Controller
{
	public $db;

	public function __construct(Connection $a, $b = [])//构造函数--这个类依赖于 Connection
	{
		$this->db = $a;
	}

}