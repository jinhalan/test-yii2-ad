<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/8/31
 * Time: 14:33
 */
namespace frontend\models;

use yii\base\Model;

class TestGetData extends Model
{
	public $username;

	public $password;

	public $email;

	public $uploadFile;

	public $items;

	public $category;

	public $country;

	public function rules()
	{
		return [
			[['username', 'password'], 'required', 'when' => function($model) {
				return $model->country == 'USA';
			}, 'whenClient' => "function (attribute, value) {
				return $('#testgetdata-country').val() == 'USA';
			}"],//如果 country 的值为 USA 设为必须
			['username', 'default'],//如果为空，设为 null
			['email', 'default', 'value' => 'jintian@qq.com'],//如果为空，设为 jintian@qq.com
			//['uploadFile', 'image'],
			[['uploadFile', 'items', 'category', 'country'], 'safe'],
		];
	}
}