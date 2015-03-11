<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */

$this->title = Yii::t('app', 'IRPM for {modelClass}', [
    'modelClass' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quotes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'enableClientValidation' => true
    ]); ?>
    <div class="tabbable">
        <?= $form->field($model, 'irpm_percent')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'irpm_type')->radioList(Yii::$app->params['quote']['debit_credit']) ?>
    </div>

    <div class="form-group">
        <a class="btn btn-success" href="<?=Yii::$app->urlManager->createUrl('quotes/view',$model->id)?>"> Back</a>
        <?= Html::submitButton( Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
