<?php if ($flash = Yii::$app->session->getFlash('Quote-saved')): ?>
    <div class="alert alert-success">
        <p><?= $flash ?></p>
    </div>
<?php endif; ?>

<h1><?= $model->name ?></h1>
<div class="quotes-update">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="6" class="bg-gray">
                Community BOP Quote <?= $model->name; ?> <?= $model->date_quoted ?>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="bg-gray"><strong>Named Ins:</strong></td>
            <td colspan="5"><?= $model->name; ?></td>
        </tr>
        <tr>
            <td class="bg-gray"><strong>Address:</strong></td>
            <td colspan="2"><?= $model->address; ?></td>
            <td class="bg-gray"><strong>Zip Code:</strong></td>
            <td colspan="2"><?= $model->zip_code; ?></td>
        </tr>
        <tr>
            <td class="bg-gray"><strong>Date:</strong></td>
            <td><?= $model->date_quoted ?></td>
            <td class="bg-gray"><strong>Agent:</strong></td>
            <td colspan="3"><?= $model->agent; ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr class="bg-gray">
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
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'zone') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'does_lead_exclusion_apply','yes_no') ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr class="bg-gray">
            <td><strong>Country</strong></td>
            <td><strong>Owner/Tenant</strong></td>
            <td><strong>Apt in Building</strong></td>
            <td><strong>Oper. by Ins.</strong></td>
            <td><strong>Merc. in Bldg.</strong></td>
            <td><strong>Sole Occup.</strong></td>
        </tr>
        <tr>
            <td><?= $model->countryModel ? $model->countryModel->name : null ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'occupied_type') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'apt_in_bldg','no_yes') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'operated_by_insured','yes_no') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'mercantile_occupany_in_bldg','yes_no') ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'sole_occupancy','yes_no') ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td class="bg-gray"><strong>Occupancy</strong></td>
            <td colspan="5"><?= $model->occupancy ? $model->occupancy->name : null ?></td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td></td>
            <td class="bg-gray"><strong>Settlement</strong></td>
            <td class="bg-gray"><strong>Amount of Ins.</strong></td>
            <td class="bg-gray"><strong>Deductible</strong></td>
            <td class="bg-gray"><strong>Premium</strong></td>
            <td class="bg-gray"><strong>Min.</strong></td>
        </tr>
        <tr>
            <td class="bg-gray"><strong>Building</strong></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'building_rc_acv') ?></td>
            <td><?= Yii::$app->formatter->asCurrency($model->building_amount_of_ins) ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'deductible_bldg') ?></td>
            <td><?= Yii::$app->formatter->asCurrency($model->getBldgComposite()) ?></td>
            <td>---</td>
        </tr>
        <tr>
            <td class="bg-gray"><strong>Bus. Prop.</strong></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'business_property_rc_acv') ?></td>
            <td><?= Yii::$app->formatter->asCurrency($model->bus_amount_of_ins); ?></td>
            <td><?= Yii::$app->quote->getValueByAttribute($model, 'deductible_bp') ?></td>
            <td><?= Yii::$app->formatter->asCurrency($model->getBPComposite()) ?></td>
            <td>---</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="bg-gray"><strong>BI & PD Limit</strong></td>
            <td class="bg-gray"><strong>Aggregate Limit</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?=Yii::$app->quote->getValueByAttribute($model,'prop_damage');?></td>
            <td><?=Yii::$app->quote->getValueByAttribute($model,'agregate');?></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getLiabilityFormPremium()) ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="bg-gray"><strong>Medical Payments</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $model->medPayment ? $model->medPayment->name : '' ?></td>
            <td>
                <?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getMedicalPaymentsPremium()) ?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" class="text-center"><strong>Optional Coverages</strong></td>
            <td class="bg-gray"><strong>Special</strong></td>
        </tr>
        <tr class="bg-gray">
            <td><strong>Form #</strong></td>
            <td colspan="2"><strong>Form Title</strong></td>
            <td><strong>Limit</strong></td>
            <td><strong>Premium</strong></td>
            <td><strong>Ded</strong></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Optional Property Coverages</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?= $this->render('quote/_optional_property_coverages', ['model' => $model]) ?>
        <tr>
            <td></td>
            <td colspan="2">Optional Liability Coverages</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?= $this->render('quote/_optional_liability_coverages', ['model' => $model]) ?>

        </tbody>
    </table>
    <?= $this->render('quote/_total', ['model' => $model]) ?>
</div>