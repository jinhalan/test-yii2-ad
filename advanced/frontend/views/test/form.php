<?php
/**
 * Created by PhpStorm.
 * User: lanjh
 * Date: 2016/8/31
 * Time: 12:06
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

echo '<h3>天地不仁，以万物为刍狗。圣人不仁，以百姓为刍狗。</h3>';
?>

<?php Pjax::begin([

]); ?>

<?php $form = ActiveForm::begin([
	//'id' => 'login-form',
	//'action' => '/test'
	'options' => [
		'data' => ['pjax' => true],//data-pjax=1
		'enctype' => 'multipart/form-data',
	],
]);
//$form->enableClientValidation = false;
?>

	<?= $form->field($model, 'username')->hint('Please enter your name')->label('Name') ?>
	<?= $form->field($model, 'password')->passwordInput() ?>
	<?= $form->field($model, 'email')->input('email') ?>
	<?= $form->field($model, 'uploadFile[]')->input('file', ['multiple' => 'multiple']) ?>
	<?= $form->field($model, 'items[]')->checkboxList(['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D']) ?>
	<?= $form->field($model, 'category')->dropDownList(['a' => 'A', 'b' => 'B', 'c' => 'C']) ?>
	<?= $form->field($model, 'country') ?>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>

<?php ActiveForm::end() ?>

<?php Pjax::end(); ?>