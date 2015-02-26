<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\ForgotForm $model
 */

$this->title = Yii::t('user', 'Forgot password');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-login" style="padding: 5px">

        <div><img width="340" src="/alliance_logo.jpg"></div><br />
	<?php if ($flash = Yii::$app->session->getFlash('Forgot-success')): ?>
        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>
    <?php else: ?>
                <?php $form = ActiveForm::begin(['id' => 'forgot-form','options' => ['class' => 'form-horizontal well','style'=>'margin-bottom:0px;']]); ?>
                    <?=$form->field($model, 'email')->textInput(['placeholder'=>"Email"])->label(false) ?>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('user', 'Send'), ['class' => 'btn btn-primary']) ?>

                    </div>
                     <div style="float: right"><?= Html::a(Yii::t("user", "Back to Login"), ["/user/login"]) ?></div><br />

                <?php ActiveForm::end(); ?>
	<?php endif; ?>
</div>
