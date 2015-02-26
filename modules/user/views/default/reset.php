<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\User $user
 * @var bool $success
 * @var bool $invalidKey
 */

$this->title = Yii::t('user', 'Reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-login">

    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal well','style'=>'margin-bottom:0px;'],


    ]); ?>

    <?= $form->field($user, 'newPassword')->passwordInput() ?>
    <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t("user", "Reset"), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>