<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-login" style="padding: 5px">

	<div><img width="340" src="/alliance_logo.jpg"></div><br />

    <?php if ($flash = Yii::$app->session->getFlash('Reset-success')): ?>
    <div class="alert alert-success">
        <p><?= $flash ?></p>
    </div>
    <?php endif;?>

	<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'options' => ['class' => 'form-horizontal well','style'=>'margin-bottom:0px;'],


	]); ?>

	<?= $form->field($model, 'username')->textInput(['placeholder'=>"Email / Username"])->label(false) ?>
	<?= $form->field($model, 'password')->passwordInput(['placeholder'=>"Password"])->label(false) ?>
    <div class="form-group" style="width: 50%;float: right;text-align: right">
        <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-success','style'=>'width:90%;margin-top:-6px']) ?>
    </div>
	<?= $form->field($model, 'rememberMe')->checkbox() ?>
    <?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?>
	<?php ActiveForm::end(); ?>

</div>