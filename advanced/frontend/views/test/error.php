<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
$this->title = $name;
?>

<div class = "site-error">
	<h2>customized error</h2>
	<h1><?= Html::encode($this->title) ?></h1>

	<div class = "alert alert-danger">
		<?= nl2br(Html::encode($message)) ?>
	</div>

	<p>
		The above error occurred while the Web server was processing your request.
	</p>

	<p>
		这是一个自定义的错误显示页面。
	</p>
</div>