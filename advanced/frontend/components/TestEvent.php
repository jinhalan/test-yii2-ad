<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/8/15
 * Time: 15:04
 */
namespace frontend\components;

use yii\base\Component;
use yii\base\Event;

//创建时间，附加事件处理器
Event::on(TestEvent::className(), TestEvent::EVENT_HELLO, function($event){
	echo '成功触发类级别事件：'.$event->name.'（事件处理器3）<br/>';
});

class TestEvent extends Component
{
	const EVENT_HELLO = 'hello';

	public function bar()
	{
		$this->trigger(self::EVENT_HELLO);//调用所有附加到hello事件的时间处理器

		return '功成身退，天之道';
	}
}