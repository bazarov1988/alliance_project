<?php if ($flash = Yii::$app->session->getFlash('Quote-saved')): ?>
    <div class="alert alert-success">
        <p><?= $flash ?></p>
    </div>
<?php endif;?>

<h1><?= $model->name ?></h1>
<div class="quotes-update">
<table class="table table-striped table-bordered">
<tr>
    <td><strong>Named Ins:</strong></td>
    <td><?=$model->name;?></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td><strong>Address:</strong></td>
    <td><?=$model->address;?></td>
    <td> </td>
    <td><strong>Zip Code:</strong></td>
    <td><?=$model->zip_code;?></td>
    <td></td>
</tr>
<tr>
    <td><strong>Date:</strong></td>
    <td><?=$model->date_quoted?></td>
    <td><strong>Agent:</strong></td>
    <td><?=$model->agent;?></td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
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
    <td><?=Yii::$app->quote->getValueByAttribute($model,'policy_type')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'construction')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'protection')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'prior_since')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'does_lead_exclusion_apply')?></td>
    <td>No</td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
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
    <td><?=$model->countryModel?$model->countryModel->name:null?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'occupied_type')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'apt_in_bldg')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'operated_by_insured')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'mercantile_occupany_in_bldg')?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'sole_occupancy')?></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td><strong>Occupancy</strong></td>
    <td><?=$model->occupancy?$model->occupancy->name:null?></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>Settlement</td>
    <td>Amount of Ins.</td>
    <td>Deductible</td>
    <td>Premium</td>
    <td>Min.</td>
</tr>
<tr>
    <td>Building</td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'building_rc_acv')?></td>
    <td><?=$model->building_amount_of_ins?'$'.$model->building_amount_of_ins:null;?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'deductible_bldg')?></td>
    <td>$0.00</td>
    <td>---</td>
</tr>
<tr>
    <td>Bus. Prop.</td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'business_property_rc_acv')?></td>
    <td><?=$model->bus_amount_of_ins?'$'.$model->bus_amount_of_ins:null;?></td>
    <td><?=Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    <td>$0.00</td>
    <td>---</td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td>BI & PD Limit</td>
    <td>Aggregate Limit</td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td>$1,000,000</td>
    <td>$2,000,000</td>
    <td>$255.00</td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td>Medical Payments</td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td><?=$model->medPayment?$model->medPayment->name:''?></td>
    <td>$<?=$model->medPayment?($model->policy_type==1?$model->medPayment->standart:$model->medPayment->premium):null?></td>
    <td></td>
</tr>
<tr>
    <th colspan="5"><strong>Optional Coverages</strong></th>

    <th><strong>Special</strong></th>
</tr>


<tr>
    <td><strong>Form #</strong></td>
    <td><strong>Form Title</strong></td>
    <td> </td>
    <td><strong>Limit</strong></td>
    <td><strong>Premium</strong></td>
    <td><strong>Ded</strong></td>
</tr>
<tr>
    <td></td>
    <td>Optional Property Coverages</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td>SF-4A</td>
    <td>Cause of Loss - Business Property</td>
    <td> </td>
    <td>$25,000 </td>
    <td>$16.00</td>
    <td></td>
</tr>
<tr>
    <td>SF-345</td>
    <td>Equipment Breakdown</td>
    <td> </td>
    <td> </td>
    <td>$25.00</td>
    <td></td>
</tr>

<thead>
<tr>
    <th colspan="6"><strong>Optional Property Coverages</strong></th>
</tr>
</thead>
    <?=$this->render('quote/_OptionalPropertyCoverages',['model'=>$model])?>
    <?php
    $insuredPremisesPremium = $model->propertyCoverages->getInsuredPremisesPremium();
    if ($insuredPremisesPremium > 0) {
        ?>
        <tr>
            <td><?= $model->propertyCoverages->getFormNumber('insured_premises') ?></td>
            <td><?= $model->propertyCoverages->getAttributeLabel('insured_premises') ?></td>
            <td></td>
            <td></td>
            <td><?= Yii::$app->formatter->asCurrency($insuredPremisesPremium) ?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <?php
    $insuredPremisesAPremium = $model->propertyCoverages->getInsuredPremisesAPremium();
    if ($insuredPremisesAPremium > 0 || $model->propertyCoverages->insured_premises_a) {
        ?>
        <tr>
            <td><?= $model->propertyCoverages->getFormNumber('insured_premises_a') ?></td>
            <td><?= $model->propertyCoverages->getAttributeLabel('insured_premises_a') ?></td>
            <td></td>
            <td></td>
            <td><?= Yii::$app->formatter->asCurrency($insuredPremisesAPremium) ?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>


<thead>
<tr>
    <th colspan="6"><strong>Optional Liability Coverages</strong></th>
</tr>
</thead>
<?php if($model->liabilityCoverages->liability_form): ?>
<tr>
    <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages,'liability_form')?></td>
    <td><?php echo $model->liabilityCoverages->getAttributeLabel('liability_form') ?> </td>
    <td> </td>
    <td><?php echo Yii::$app->quote->getValueByAttribute($model,'prop_damage')?></td>
    <td><?=Yii::$app->formatter->asCurrency($model->liabilityCoverages->getLiabilityFormPremium())?></td>
    <td></td>
</tr>
<?php endif;?>
<tr>
    <td></td>
    <td>Credit to Remove Liability Coverage</td>
    <td> </td>
    <td> </td>
    <td><?=Yii::$app->formatter->asCurrency($model->liabilityCoverages->getCreditPremium())?></td>
    <td></td>
</tr>
<?php if($model->liabilityCoverages->add_insured_owners_lessees): ?>
<tr>
    <td>LS-24</td>
    <td><?php echo $model->liabilityCoverages->getAttributeLabel('add_insured_owners_lessees');//Additional Insured ?> </td>
    <td> </td>
    <td> </td>
    <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getAdditionalInsuredOwners())?></td>
    <td></td>
</tr>
<?php endif;?>
<?php if($model->liabilityCoverages->add_insured_owners_contactors): ?>
<tr>
    <td>LS-24A</td>
    <td><?php echo $model->liabilityCoverages->getAttributeLabel('add_insured_owners_contactors');//Additional Insured ?> </td>
    <td> </td>
    <td> </td>
    <td><?=Yii::$app->formatter->asCurrency($model->liabilityCoverages->getAdditionalInsuredContractors())?></td>
    <td></td>
</tr>
<?php endif;?>
<?php if($model->liabilityCoverages->additional_insured): ?>
<tr>
    <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages,'additional_insured')?></td>
    <td><?php echo $model->liabilityCoverages->getAttributeLabel('additional_insured');?> </td>
    <td> </td>
    <td> </td>
    <td><?=Yii::$app->formatter->asCurrency($model->liabilityCoverages->additional_insured)?></td>

    <td></td>
</tr>
<?php endif;?>
<?php if($model->liabilityCoverages->battery_exclusion): ?>
<tr>
    <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages, 'battery_exclusion')?></td>
    <td><?php echo $model->liabilityCoverages->getAttributeLabel('battery_exclusion');//Additional Insured ?> </td>
    <td> </td>
    <td> </td>
    <td><?=Yii::$app->formatter->asCurrency($model->liabilityCoverages->battery_exclusion())?></td>

    <td></td>
</tr>
<?php endif;?>
<?php if($model->liabilityCoverages->barber_shop_liability):?>
<tr>
    <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages,'barber_shop_liability');//LS-44?></td>
    <td><?php echo $model->liabilityCoverages->getAttributeLabel('barber_shop_liability');//Beauty or Barber Shop Liability?></td>
    <td> </td>
    <td>$1,000,000 / $2,000,000</td>
    <td><?=Yii::$app->formatter->asCurrency(48.00)?></td>
    <td></td>
</tr>
<?php endif;?>
<tr>
    <td>LS-373</td>
    <td>Exclusion of Canine Related Injuries or Damages</td>
    <td> </td>
    <td> </td>
    <td>-$1.00</td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>

    <?php if($model->liabilityCoverages->designated_premises): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('designated_premises')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('designated_premises')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getDesignatedPremisesPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->contractual_liability_limitation): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('contractual_liability_limitation')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('contractual_liability_limitation')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getContractualLiabilityLimitationPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->project_only): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('project_only')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('project_only')?></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getProjectOnlyLimit() )?></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getProjectOnlyPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php
    $automobileCoveragePremium = $model->liabilityCoverages->getAutomobileCoveragePremium();
    if ($automobileCoveragePremium > 0) {
        ?>
        <tr>
            <td><?= $model->liabilityCoverages->getFormNumber('automobile_coverage') ?></td>
            <td><?= $model->liabilityCoverages->getAttributeLabel('automobile_coverage') ?></td>
            <td></td>
            <td></td>
            <td><?= Yii::$app->formatter->asCurrency($automobileCoveragePremium) ?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <?php if($model->liabilityCoverages->acquired_entities): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('acquired_entities')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('acquired_entities')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getAcquiredEntitiesPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->all_hazards): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('all_hazards')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('all_hazards')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getAllHazardsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->a_d_p_b): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('a_d_p_b')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('a_d_p_b')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getADPBPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->athletic_participants): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('athletic_participants')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('athletic_participants')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getAthleticParticipantsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->certain_skin_care_service): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('certain_skin_care_service')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('certain_skin_care_service')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getCertainSkinCareServicePremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->certain_skin_care_service_a): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('certain_skin_care_service_a')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('certain_skin_care_service_a')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getCertainSkinCareServiceAPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->discrimination_clarification): ?>
    <tr>
        <td><?=$model->liabilityCoverages->getFormNumber('discrimination_clarification')?></td>
        <td><?=$model->liabilityCoverages->getAttributeLabel('discrimination_clarification')?></td>
        <td></td>
        <td></td>
        <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getDiscriminationClarificationPremium() )?></td>
        <td></td>
    </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->employment_practices): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('employment_practices')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('employment_practices')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getEmploymentPracticesPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->fairs): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('fairs')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('fairs')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getFairsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->known_loss_damage): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('known_loss_damage')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('known_loss_damage')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getKnownLossDamagePremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->dry_cleaning_damage): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('dry_cleaning_damage')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('dry_cleaning_damage')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getDryCleaningDamagePremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->liquor_liability): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('liquor_liability')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('liquor_liability')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getLiquorLiabilityPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->operations): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('operations')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('operations')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getOperationsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->saddle_animals): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('saddle_animals')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('saddle_animals')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getSaddleAnimalsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->ice_control_operations): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('ice_control_operations')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('ice_control_operations')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getIceControlOperationsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php if($model->liabilityCoverages->ice_control_operations): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('ice_control_operations')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('ice_control_operations')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getIceControlOperationsPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>
    <!-- BU104 -->
    <tr>
        <td><?=$model->liabilityCoverages->getFormNumber('exclusion_canine_related_injuries_damages')?></td>
        <td><?=$model->liabilityCoverages->getAttributeLabel('exclusion_canine_related_injuries_damages')?></td>
        <td></td>
        <td></td>
        <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getExclusionCanineRelatedInjuriesDamagesPremium() )?></td>
        <td></td>
    </tr>

    <?php if($model->liabilityCoverages->extended_pollution_exclusion): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('extended_pollution_exclusion')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('extended_pollution_exclusion')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getExtendedPollutionExclusionPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php
    $fireLegalPremium = $model->liabilityCoverages->getFireLegalPremium();
    if ($fireLegalPremium != 0) {
    ?>
        <tr>
            <td><?= $model->liabilityCoverages->getFormNumber('fire_legal') ?></td>
            <td><?= $model->liabilityCoverages->getAttributeLabel('fire_legal') ?></td>
            <td></td>
            <td></td>
            <td><?= Yii::$app->formatter->asCurrency($fireLegalPremium) ?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <?php
    $automobileCoverageAPremium = $model->liabilityCoverages->getAutomobileCoverageAPremium();
    if($automobileCoverageAPremium > 0) {
    ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('automobile_coverage_a')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('automobile_coverage_a')?></td>
            <td></td>
            <td><?=$model->liabilityCoverages->getAutomobileCoverageALimit()?></td>
            <td><?=Yii::$app->formatter->asCurrency( $automobileCoverageAPremium )?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <?php
    /*
    // Empty field in Entry Sheet
    $rating14AptsPremium = $model->liabilityCoverages->getRating14AptsPremium();
    if($rating14AptsPremium != 0) {
        ?>
        <tr>
            <td></td>
            <td>Rating for 1 -4 Apts</td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $rating14AptsPremium )?></td>
            <td></td>
        </tr>
    <?php
    }
    */
    ?>

    <?php
    $liquorLiabilityReceiptsPremium = $model->liabilityCoverages->getLiquorLiabilityReceiptsPremium();
    if($liquorLiabilityReceiptsPremium != 0) {
    ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('liquor_liability_receipts')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('liquor_liability_receipts')?></td>
            <td></td>
            <td><?=$model->liabilityCoverages->getLiquorLiabilityReceiptsLimit()?></td>
            <td><?=Yii::$app->formatter->asCurrency( $liquorLiabilityReceiptsPremium )?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <tr>
        <td>*</td>
        <td>Medical Payments</td>
        <td></td>
        <td><?=$model->liabilityCoverages->getMedicalPaymentsLimit()?></td>
        <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getMedicalPaymentsPremium() )?></td>
        <td></td>
    </tr>

    <?php if($model->liabilityCoverages->getPersonalInjuryApplies()): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('personal_injury')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('personal_injury')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getPersonalInjuryPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

    <?php
    $poolLiabilityPremium = $model->liabilityCoverages->getPoolLiabilityPremium();
    if($poolLiabilityPremium > 0) {
        ?>
        <tr>
            <td></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('pool_liability')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $poolLiabilityPremium )?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <?php
    $completedOperationsPremium = $model->liabilityCoverages->getCompletedOperationsPremium();
    if($completedOperationsPremium != 0) {
        ?>
        <tr>
            <td></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('completed_operations')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $completedOperationsPremium )?></td>
            <td></td>
        </tr>
    <?php
    }
    ?>

    <?php if(!$model->liabilityCoverages->water_damage_exclusion): ?>
        <tr>
            <td><?=$model->liabilityCoverages->getFormNumber('water_damage_exclusion')?></td>
            <td><?=$model->liabilityCoverages->getAttributeLabel('water_damage_exclusion')?></td>
            <td></td>
            <td></td>
            <td><?=Yii::$app->formatter->asCurrency( $model->liabilityCoverages->getWaterDamageExclusionPremium() )?></td>
            <td></td>
        </tr>
    <?php endif; ?>

<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td>Forms & Endorsements</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td>SF-20, SF-311, SF-4A (B.P.), LS-5, LS-373, SF-10S</td>
    <td>This is a reference to the forms listed above (A23-A29)</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td>, SF-345, LS-19, LS-44</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td>* Refer to Form SF-311</td>
    <td> </td>
    <td> </td>
    <td>Premium</td>
    <td>$672.00</td>
    <td>total of premiums</td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td>IRPM</td>
    <td>$0.00</td>
    <td>IRPM Credits from help area like 1-10%</td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td>Total Premium</td>
    <td>$672.00</td>
    <td>Total of Premium - IRPM Amount</td>
</tr>
<tr>
    <td></td>
    <td> </td>
    <td> </td>
    <td>Fire Fee</td>
    <td>$1.89</td>
    <td>Auto based on territory</td>
</tr>
</table>
</div>