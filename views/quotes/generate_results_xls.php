<table>
    <tr>
        <th class="bg-gray">
            Community BOP Quote <?= $model->name; ?> <?= $model->date_quoted ?>
        </th>
    </tr>
    <tr>
        <th class="bg-gray">Named Ins:</th>
        <td><?= $model->name; ?></td>
    </tr>
    <tr>
        <th class="bg-gray">Address:</th>
        <td><?= $model->address; ?></td>
        <td></td>
        <th class="bg-gray">Zip Code:</th>
        <td colspan="2"><?= $model->zip_code; ?></td>
    </tr>
    <tr>
        <th class="bg-gray">Date:</th>
        <td><?= $model->date_quoted ?></td>
        <th class="bg-gray">Agent:</th>
        <td ><?= $model->agent; ?></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <th class="bg-gray">Policy Type</th>
        <th class="bg-gray">Construction</th>
        <th class="bg-gray">Protection</th>
        <th class="bg-gray">Prior/Since</th>
        <th class="bg-gray">Zone</th>
        <th class="bg-gray">Lead Excl.</th>
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
        <td></td>
    </tr>
    <tr class="bg-gray">
        <th class="bg-gray">County</th>
        <th class="bg-gray">Owner/Tenant</th>
        <th class="bg-gray">Apt in Building</th>
        <th class="bg-gray">Oper. by Ins.</th>
        <th class="bg-gray">Merc. in Bldg.</th>
        <th class="bg-gray">Sole Occup.</th>
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
        <td></td>
    </tr>
    <tr>
        <th class="bg-gray">Occupancy</th>
        <td><?= $model->occupancy ? $model->occupancy->name : null ?></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <th class="bg-gray">Settlement</th>
        <th class="bg-gray">Amount of Ins.</th>
        <th class="bg-gray">Deductible</th>
        <th class="bg-gray">Premium</th>
        <th class="bg-gray">Min.</th>
    </tr>
    <tr>
        <th class="bg-gray">Building</th>
        <td><?= Yii::$app->quote->getValueByAttribute($model, 'building_rc_acv') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->building_amount_of_ins) ?></td>
        <td><?= Yii::$app->quote->getValueByAttribute($model, 'deductible_bldg') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->getBldgComposite()) ?></td>
        <td>---</td>
    </tr>
    <tr>
        <th class="bg-gray">Bus. Prop.</th>
        <td><?= Yii::$app->quote->getValueByAttribute($model, 'business_property_rc_acv') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->bus_amount_of_ins); ?></td>
        <td><?= Yii::$app->quote->getValueByAttribute($model, 'deductible_bp') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->getBPComposite()) ?></td>
        <td>---</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <th class="bg-gray">BI and PD Limit</th>
        <th class="bg-gray">Aggregate Limit</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?=Yii::$app->quote->getValueByAttribute($model,'prop_damage');?></td>
        <td><?=Yii::$app->quote->getValueByAttribute($model,'agregate');?></td>
        <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getLiabilityFormPremium()) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-gray">Medical Payments</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><?= $model->medPayment ? $model->medPayment->name : '' ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getMedicalPaymentsPremium()) ?></td>
    </tr>
    <tr>
        <th class="bg-gray">Optional Coverages</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-gray">Special</th>
    </tr>
    <tr>
        <th class="bg-gray">Form #</th>
        <th class="bg-gray">Form Title</th>
        <th></th>
        <th class="bg-gray">Limit</th>
        <th class="bg-gray">Premium</th>
        <th class="bg-gray">Ded</th>
    </tr>
    <tr>
        <td></td>
        <th>Optional Property Coverages</th>
    </tr>
    <?= $this->render('quote/_optional_property_coverages_xls', ['model' => $model]) ?>
    <tr>
        <td></td>
        <th>Optional Liability Coverages</th>
    </tr>
    <?= $this->render('quote/_optional_liability_coverages_xls', ['model' => $model]) ?>

    <tr>
        <td></td>
    </tr>
    <tr>
        <th class="bg-gray">Forms and Endorsements</th>
    </tr>
    <tr>
        <td>SF-20, SF-311, SF-4A (B.P.), LS-5, LS-373, SF-10S This is a reference to the forms listed above (A23-A29)</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-gray">Premium</th>
        <td><?= Yii::$app->formatter->asCurrency($model->getPremium());?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-gray">IRPM</th>
        <td><?= Yii::$app->formatter->asCurrency($model->getIRPM());?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-gray">Total Premium</th>
        <td><?= Yii::$app->formatter->asCurrency($model->getPremiumTotal());?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-gray">Fire Fee</th>
        <td><?= Yii::$app->formatter->asCurrency($model->getFireFree());?></td>
    </tr>
</table>