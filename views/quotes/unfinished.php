<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\QuotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quotes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Quote',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if ($flash = Yii::$app->session->getFlash('Quote-saved')): ?>
        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>
    <?php endif;?>
    <?php if ($flash = Yii::$app->session->getFlash('Quote-error')): ?>
        <div class="alert alert-danger">
            <p><?= $flash ?></p>
        </div>
    <?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'address',
            'date_quoted',
            // 'zip_code',
            // 'agent',
            // 'construction',
            // 'protection',
            // 'country',
            // 'zone',
            // 'prior_since',
            // 'occupied',
            // 'occupied_type',
            // 'policy_type',
            // 'deductible_bldg',
            // 'deductible_bp',
            // 'building_rc_acv',
            // 'business_property_rc_acv',
            // 'mercantile_occupany_in_bldg',
            // 'status',
            // 'does_lead_exclusion_apply',
            // 'operated_by_insured',
            // 'apt_in_bldg',
            // 'sole_occupancy',
            // 'consumed_on_premises',
            // 'building_amount_of_ins',
            // 'bus_amount_of_ins',
            // 'prop_damage',
            // 'agregate',
            // 'med_payment',
            // 'each_occurrence',
            // 'each_person_accident',

            ['class' => 'yii\grid\ActionColumn','header'=>'Actions','buttons'=>[
                'view'=>function($url,$model){
                    return $model->status != \app\models\Quotes::NEW_QUOTE ? Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [ 'title' => Yii::t('app', 'View')]) : '';
                }
            ]
            ],
        ],
    ]); ?>

</div>
