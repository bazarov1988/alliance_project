<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quotes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'date_create',
            'date_quoted',
            'zip_code',
            'agent',
            'construction',
            'protection',
            'country',
            'zone',
            'prior_since',
            'occupied',
            'occupied_type',
            'policy_type',
            'deductible_bldg',
            'deductible_bp',
            'building_rc_acv',
            'business_property_rc_acv',
            'mercantile_occupany_in_bldg',
            'status',
            'does_lead_exclusion_apply',
            'operated_by_insured',
            'apt_in_bldg',
            'sole_occupancy',
            'consumed_on_premises',
            'building_amount_of_ins',
            'bus_amount_of_ins',
            'prop_damage',
            'agregate',
            'med_payment',
            'each_occurrence',
            'each_person_accident',
        ],
    ]) ?>

</div>
