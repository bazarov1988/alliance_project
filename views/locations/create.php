<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Occupancy */

$this->title = 'Create Occupancy';
$this->params['breadcrumbs'][] = ['label' => 'Occupancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="occupancy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
