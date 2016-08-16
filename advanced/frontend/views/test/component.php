<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/8/15
 * Time: 10:16
 */
use yii\jui\DatePicker;

echo '<h3>功成身退，天之道</h3>';

echo DatePicker::widget([
	//'language' => 'zh-CN',
	'name' => 'country',
	'value' => time(),
	//'dateFormat' => 'Y-M-d',
	'containerOptions' => [
		'dateFormat' => 'yy-mm-dd',
	]
]);