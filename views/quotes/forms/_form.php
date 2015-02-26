<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Countries;
use app\models\Occupancy;
use app\models\MedicalPayments;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */
/* @var $form yii\widgets\ActiveForm */
?>
<br />
<div class="quotes-form">

    <table class="table table-striped table-bordered">
        <tr><td><?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'zip_code')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'agent')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'construction')->dropDownList([1=>'Frame',2=>'Masonry',3=>'Fire Resistive']) ?></td></tr>
        <tr><td><?= $form->field($model, 'protection')->dropDownList(Yii::$app->params['quote']['protection']) ?></td></tr>
        <tr><td><?= $form->field($model, 'country')->textInput()->dropDownList(ArrayHelper::map(Countries::find()->all(), 'id', 'name'),['prompt'=>'Select']) ?></td></tr>
        <tr><td><?= $form->field($model, 'zone')->dropDownList(Yii::$app->params['quote']['zone']) ?></td></tr>
        <tr><td><?= $form->field($model, 'prior_since')->dropDownList(Yii::$app->params['quote']['prior_since']) ?></td></tr>
        <tr><td><?= $form->field($model, 'occupied')->dropDownList(ArrayHelper::map(Occupancy::find()->all(), 'id', 'name'),['prompt'=>'Select']) ?></td></tr>
        <tr><td><?= $form->field($model, 'occupied_type')->radioList(Yii::$app->params['quote']['occupied_type']) ?></td></tr>
        <tr><td><?= $form->field($model, 'policy_type')->radioList(Yii::$app->params['quote']['policy_type']) ?></td></tr>
        <tr><td><?= $form->field($model, 'deductible_bldg')->dropDownList(Yii::$app->params['quote']['deductible']) ?></td></tr>
        <tr><td><?= $form->field($model, 'deductible_bp')->dropDownList(Yii::$app->params['quote']['deductible']) ?></td></tr>
        <tr><td><?= $form->field($model, 'building_rc_acv')->dropDownList(Yii::$app->params['quote']['building_rc_acv']) ?></td></tr>
        <tr><td><?= $form->field($model, 'business_property_rc_acv')->dropDownList(Yii::$app->params['quote']['business_property_rc_acv']) ?></td></tr>
        <tr><td><?= $form->field($model, 'mercantile_occupany_in_bldg')->dropDownList(Yii::$app->params['quote']['yes_no']) ?></td></tr>
        <tr><td><?= $form->field($model, 'does_lead_exclusion_apply')->dropDownList(Yii::$app->params['quote']['yes_no']) ?></td></tr>
        <tr><td><?= $form->field($model, 'operated_by_insured')->dropDownList(Yii::$app->params['quote']['yes_no']) ?></td></tr>
        <tr><td><?= $form->field($model, 'apt_in_bldg')->dropDownList(Yii::$app->params['quote']['no_yes']) ?></td></tr>
        <tr><td><?= $form->field($model, 'sole_occupancy')->dropDownList(Yii::$app->params['quote']['yes_no']) ?></td></tr>
        <tr><td><?= $form->field($model, 'consumed_on_premises')->dropDownList(Yii::$app->params['quote']['yes_no']) ?></td></tr>
        <tr><td><?= $form->field($model, 'building_amount_of_ins')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'bus_amount_of_ins')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'prop_damage')->dropDownList(Yii::$app->params['quote']['prop_damage']) ?></td></tr>
        <tr><td><?= $form->field($model, 'agregate')->dropDownList(Yii::$app->params['quote']['agregate']) ?></td></tr>
        <tr><td><?= $form->field($model, 'med_payment')->dropDownList(ArrayHelper::map(MedicalPayments::find()->all(), 'id', 'name'),['prompt'=>'Select'])?></td></tr>
        <tr><td><?= $form->field($model, 'each_occurrence')->textInput(['maxlength' => 255]) ?></td></tr>
        <tr><td><?= $form->field($model, 'each_person_accident')->textInput(['maxlength' => 255]) ?></td></tr>
    </table>


</div>
