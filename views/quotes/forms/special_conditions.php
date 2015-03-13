<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpecialConditions */
/* @var $form ActiveForm */
?>
<br />
<div class="quotes-special_conditions">


    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th></th>
            <th><?= Yii::t('app','Credit')?></th>
        </tr>
        </thead>
        <tbody>
        <tr><td><?= $form->field($model, 'external_fire_alarm_system')->checkbox() ?></td><td>3%</td></tr>
        <tr><td><?= $form->field($model, 'approved_watchman_service')->checkbox() ?></td><td>4%</td></tr>
        <tr><td><?= $form->field($model, 'central_station_reporting')->checkbox() ?></td><td>8%</td></tr>
        <tr><td><?= $form->field($model, 'smoke_detectors')->checkbox() ?></td><td>2%</td></tr>
        <tr><td><?= $form->field($model, 'burglary_alarm_only')->checkbox() ?></td><td>3%</td></tr>
        <tr><td><?= $form->field($model, 'fire_resistive')->checkbox(['disabled'=>true]) ?></td><td>25%</td></tr>
        <tr><td><?= $form->field($model, 'sprinklered')->checkbox() ?></td><td>35%</td></tr>
        <tr><td><?= $form->field($model, 'fire_resistive_sprinklered')->checkbox() ?></td><td>50%</td></tr>
        <tr><td><?= $form->field($model, 'hood_and_duct')->checkbox() ?></td><td>10%</td></tr>
        <tr><td><?= $form->field($model, 'above')->checkbox() ?></td><td>15%</td></tr>
        <tr><td><?= $form->field($model, 'all_above')->checkbox() ?></td><td>20%</td></tr>
        <tr><td><?= $form->field($model, 'metal_building')->checkbox() ?></td><td>20%</td></tr>
        <tr><td><?= $form->field($model, 'storage_buildings')->checkbox() ?></td><td>15%</td></tr>
        <tr><td><?= $form->field($model, 'conforming_code_specifications')->checkbox() ?></td><td></td></tr>
        </tbody>
    </table>
</div><!-- quotes-special_conditions -->
