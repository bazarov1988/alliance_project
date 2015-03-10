<?php if ($flash = Yii::$app->session->getFlash('Quote-saved')): ?>
    <div class="alert alert-success">
        <p><?= $flash ?></p>
    </div>
<?php endif; ?>

<h1><?= $model->name ?></h1>
<div class="quotes-update">
    <table class="table table-striped1 table-bordered">
        <thead>
        <tr>
            <th colspan="6">
                Community BOP Quote <?= $model->name; ?> 11/12/2014
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Named Ins:</strong></td>
            <td colspan="5"><?= $model->name; ?></td>
        </tr>
        <tr>
            <td><strong>Address:</strong></td>
            <td colspan="2"><?= $model->address; ?></td>
            <td><strong>Zip Code:</strong></td>
            <td colspan="2"><?= $model->zip_code; ?></td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td><?= $model->date_quoted ?></td>
            <td><strong>Agent:</strong></td>
            <td colspan="3"><?= $model->agent; ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td><strong>Policy Type</strong></td>
            <td><strong>Construction :</strong></td>
            <td><strong>Protection :</strong></td>
            <td><strong>Prior/Since</strong></td>
            <td><strong>Zone</strong></td>
            <td><strong>Lead Excl.</strong></td>
        </tr>
        <tr>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'policy_type') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'construction') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'protection') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'prior_since') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'does_lead_exclusion_apply') ?></td>
            <td>No</td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td><strong>County</strong></td>
            <td><strong>Owner/Tenant</strong></td>
            <td><strong>Apt in Building</strong></td>
            <td><strong>Oper. by Ins.</strong></td>
            <td><strong>Merc. in Bldg.</strong></td>
            <td><strong>Sole Occup.</strong></td>
        </tr>
        <tr>
            <td><?= $model->countryModel ? $model->countryModel->name : null ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'occupied_type') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'apt_in_bldg') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'operated_by_insured') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'mercantile_occupany_in_bldg') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'sole_occupancy') ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td><strong>Occupancy</strong></td>
            <td colspan="5"><?= $model->occupancy ? $model->occupancy->name : null ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Settlement</strong></td>
            <td><strong>Amount of Ins.</strong></td>
            <td><strong>Deductible</strong></td>
            <td><strong>Premium</strong></td>
            <td><strong>Min.</strong></td>
        </tr>
        <tr>
            <td><strong>Building</strong></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'building_rc_acv') ?></td>
            <td><?= $model->building_amount_of_ins ? '$' . $model->building_amount_of_ins : null; ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'deductible_bldg') ?></td>
            <td>$0.00</td>
            <td>---</td>
        </tr>
        <tr>
            <td><strong>Bus. Prop.</strong></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'business_property_rc_acv') ?></td>
            <td><?= $model->bus_amount_of_ins ? '$' . $model->bus_amount_of_ins : null; ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'deductible_bp') ?></td>
            <td>$0.00</td>
            <td>---</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><strong>BI & PD Limit</strong></td>
            <td><strong>Aggregate Limit</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>$1,000,000</td>
            <td>$2,000,000</td>
            <td>$255.00</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Medical Payments</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $model->medPayment ? $model->medPayment->name : '' ?></td>
            <td>
                $<?= $model->medPayment ? ($model->policy_type == 1 ? $model->medPayment->standart : $model->medPayment->premium) : null ?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" class="text-center"><strong>Optional Coverages</strong></td>
            <td><strong>Special</strong></td>
        </tr>
        <tr>
            <td><strong>Form #</strong></td>
            <td colspan="2"><strong>Form Title</strong></td>
            <td><strong>Limit</strong></td>
            <td><strong>Premium</strong></td>
            <td><strong>Ded</strong></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><strong>Optional Property Coverages</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?= $this->render('quote/_optional_property_coverages', ['model' => $model]) ?>
        <tr>
            <td></td>
            <td colspan="2"><strong>Optional Liability Coverages</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?= $this->render('quote/_optional_liability_coverages', ['model' => $model]) ?>

        </tbody>
    </table>
</div>