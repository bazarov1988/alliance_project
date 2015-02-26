<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\QuotesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'date_create') ?>

    <?= $form->field($model, 'date_quoted') ?>

    <?php // echo $form->field($model, 'zip_code') ?>

    <?php // echo $form->field($model, 'agent') ?>

    <?php // echo $form->field($model, 'construction') ?>

    <?php // echo $form->field($model, 'protection') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'zone') ?>

    <?php // echo $form->field($model, 'prior_since') ?>

    <?php // echo $form->field($model, 'occupied') ?>

    <?php // echo $form->field($model, 'occupied_type') ?>

    <?php // echo $form->field($model, 'policy_type') ?>

    <?php // echo $form->field($model, 'deductible_bldg') ?>

    <?php // echo $form->field($model, 'deductible_bp') ?>

    <?php // echo $form->field($model, 'building_rc_acv') ?>

    <?php // echo $form->field($model, 'business_property_rc_acv') ?>

    <?php // echo $form->field($model, 'mercantile_occupany_in_bldg') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'does_lead_exclusion_apply') ?>

    <?php // echo $form->field($model, 'operated_by_insured') ?>

    <?php // echo $form->field($model, 'apt_in_bldg') ?>

    <?php // echo $form->field($model, 'sole_occupancy') ?>

    <?php // echo $form->field($model, 'consumed_on_premises') ?>

    <?php // echo $form->field($model, 'building_amount_of_ins') ?>

    <?php // echo $form->field($model, 'bus_amount_of_ins') ?>

    <?php // echo $form->field($model, 'prop_damage') ?>

    <?php // echo $form->field($model, 'agregate') ?>

    <?php // echo $form->field($model, 'med_payment') ?>

    <?php // echo $form->field($model, 'each_occurrence') ?>

    <?php // echo $form->field($model, 'each_person_accident') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
