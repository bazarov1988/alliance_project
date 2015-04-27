<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Quote',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quotes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="quotes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'validateOnBlur'=>false,
        'validateOnChange'=>false
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <div class="tabbable">
        <ul class="nav nav-tabs nav-tabs-top">
            <li class="active"><a href="#s1" data-toggle="tab">Community's BOP Rater</a></li>
            <li><a href="#s2" data-toggle="tab">Special Conditions</a></li>
            <li><a href="#s3" data-toggle="tab">Optional Property Coverages</a></li>
            <li><a href="#s4" data-toggle="tab">Optional Liability Coverages</a></li>
            <li><a href="#s5" data-toggle="tab">Help</a></li>
            <li><a href="#s6" data-toggle="tab">Business Owners Program UW Guidelines</a></li>
            <li><a href="#s7" data-toggle="tab">Food Service UW Guidelines</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="s1">
                <?= $this->render('forms/_form', [
                    'model' => $model,
                    'form'=>$form
                ]) ?>
            </div>
            <div class="tab-pane" id="s2">
                <?= $this->render('forms/special_conditions', [
                    'model' => $conditions,
                    'form'=>$form
                ]) ?>
            </div>
            <div class="tab-pane" id="s3">
                <?= $this->render('forms/optional_property_coverages', [
                    'model' => $property,
                    'form'=>$form
                ]) ?>
            </div>
            <div class="tab-pane" id="s4">
                <?= $this->render('forms/optional_liability_coverages', [
                    'model' => $liability,
                    'form'=>$form
                ]) ?>
            </div>
            <div class="tab-pane" id="s5">
                <?= $this->render('forms/help')?>
            </div>
            <div class="tab-pane" id="s6">
                <?= $this->render('forms/business_owners_program')?>
            </div>
            <div class="tab-pane" id="s7">
                <?= $this->render('forms/food_service')?>
            </div>
        </div>
    </div>
    <div class="tabs-below">
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="active"><a href="#s1" data-toggle="tab">Community's BOP Rater</a></li>
            <li><a href="#s2" data-toggle="tab">Special Conditions</a></li>
            <li><a href="#s3" data-toggle="tab">Optional Property Coverages</a></li>
            <li><a href="#s4" data-toggle="tab">Optional Liability Coverages</a></li>
            <li><a href="#s5" data-toggle="tab">Help</a></li>
            <li><a href="#s6" data-toggle="tab">Business Owners Program UW Guidelines</a></li>
            <li><a href="#s7" data-toggle="tab">Food Service UW Guidelines</a></li>

        </ul>
    </div>
    <div style="margin-top: 15px;width: 30%">
        <?= $form->field($model, 'status')->dropDownList([0=>'Unfinished',1=>'Finish Quote']) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</div>
