<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Occupancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="occupancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'mer_serc')->textInput() ?>

    <?= $form->field($model, 'rate_group')->textInput() ?>

    <?= $form->field($model, 'crime_group')->textInput() ?>

	<?= $form->field($model, 'bldg_rg')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
