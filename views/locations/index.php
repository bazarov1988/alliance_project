<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OcuupancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Occupancies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="occupancy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Occupancy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'mer_serc',
            'rate_group',
            'crime_group',
            // 'bldg_rg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
