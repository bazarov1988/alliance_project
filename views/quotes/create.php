<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Quote',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quotes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'validateOnBlur'=>false,
        'validateOnChange'=>false
    ]); ?>
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#s1" data-toggle="tab">Community's BOP Rater</a></li>
            <li><a href="#s2" data-toggle="tab">Special Conditions</a></li>
            <li><a href="#s3" data-toggle="tab">Optional Property Coverages</a></li>
            <li><a href="#s4" data-toggle="tab">Optional Liability Coverages</a></li>
            <li><a href="#s5" data-toggle="tab">Help</a></li>
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
        </div>
    </div>
    <?= $form->field($model, 'status')->dropDownList([0=>'Unfinished',1=>'Finish Quote']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#s1" data-toggle="tab">Community's BOP Rater</a></li>
        <li><a href="#s2" data-toggle="tab">Special Conditions</a></li>
        <li><a href="#s3" data-toggle="tab">Optional Property Coverages</a></li>
        <li><a href="#s4" data-toggle="tab">Optional Liability Coverages</a></li>
        <li><a href="#s5" data-toggle="tab">Help</a></li>
    </ul>
    <?php ActiveForm::end(); ?>

</div>
