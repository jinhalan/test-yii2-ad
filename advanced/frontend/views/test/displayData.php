<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/9/8
 * Time: 11:46
 */
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
?>

<h3>我见证了过去，我洞悉了未来</h3>

<?php
	//格式化输出
	$formatter = \Yii::$app->formatter;
	echo '<p>'.$formatter->asEmail('1074434544@qq.com').'</p>';
	//分页
	Pjax::begin();
	$page = Yii::$app->request->get('page');
	if (!$page) {
		$page = 1;
	}
	echo "<div><img width='400px' src=\"/images/{$page}.jpg\" /></div>";
	$pagination = new Pagination([
		'totalCount' => 10,
		'pageSize' => 2,
	]);
	echo LinkPager::widget([
			'nextPageLabel' => '下一页',
			'prevPageLabel' => '上一页',
			//'maxButtonCount' => 5,
			'pagination' => $pagination,
		]);
	pjax::end();
?>