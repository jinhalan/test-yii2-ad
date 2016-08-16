<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/8/16
 * Time: 14:26
 */
namespace frontend\components;

use yii\base\Behavior;

class TestBehavior extends Behavior
{
	public $prop1 = '有之以为利，无之以为用';

	private $prop2;

	public function getProp2()
	{
		return '有利，无用';
	}
}
