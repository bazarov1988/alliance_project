<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Occupancy */

$this->title = 'Update Occupancy: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Occupancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="occupancy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
