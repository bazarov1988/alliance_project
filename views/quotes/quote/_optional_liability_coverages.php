<?php if ($model->liabilityCoverages->liability_form): ?>
    <tr>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages, 'liability_form') ?></td>
        <td colspan="2"><?php echo $model->liabilityCoverages->getAttributeLabel('liability_form') ?> </td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model, 'prop_damage') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getLiabilityFormPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
    <tr>
        <td></td>
        <td colspan="2">Credit to Remove Liability Coverage</td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getCreditPremium()) ?></td>
        <td></td>
    </tr>
<?php if ($model->liabilityCoverages->add_insured_owners_lessees): ?>
    <tr>
        <td>LS-24</td>
        <td colspan="2"><?php echo $model->liabilityCoverages->getAttributeLabel('add_insured_owners_lessees');//Additional Insured ?> </td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getAdditionalInsuredOwners()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
<?php if ($model->liabilityCoverages->add_insured_owners_contactors): ?>
    <tr>
        <td>LS-24A</td>
        <td colspan="2"><?php echo $model->liabilityCoverages->getAttributeLabel('add_insured_owners_contactors');//Additional Insured ?> </td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getAdditionalInsuredContractors()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
<?php if ($model->liabilityCoverages->additional_insured): ?>
    <tr>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages, 'additional_insured') ?></td>
        <td colspan="2"><?php echo $model->liabilityCoverages->getAttributeLabel('additional_insured'); ?> </td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->additional_insured) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
<?php if ($model->liabilityCoverages->battery_exclusion): ?>
    <tr>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->liabilityCoverages, 'battery_exclusion') ?></td>
        <td colspan="2"><?php echo $model->liabilityCoverages->getAttributeLabel('battery_exclusion');//Additional Insured ?> </td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->battery_exclusion()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
<?php if ($model->liabilityCoverages->barber_shop_liability)://Beauty or Barber Shop Liability?>
    <tr>
        <td>LS-44</td>
        <td><?php echo $model->liabilityCoverages->getAttributeLabel('barber_shop_liability'); ?></td>
        <td> <?= $model->liabilityCoverages->getBeautyNBarberTotalEmployees() ?></td>
        <td><?= $model->liabilityCoverages->getBarberShopLimit() ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getBeautyNBarberPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
    <!--<tr>
        <td>LS-373</td>
        <td colspan="2">Exclusion of Canine Related Injuries or Damages</td>
        <td></td>
        <td>-$1.00</td>
        <td></td>
    </tr>-->
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

<?php if ($model->liabilityCoverages->designated_premises): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('designated_premises') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('designated_premises') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getDesignatedPremisesPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->contractual_liability_limitation): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('contractual_liability_limitation') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('contractual_liability_limitation') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getContractualLiabilityLimitationPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->project_only): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('project_only') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('project_only') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getProjectOnlyLimit()) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getProjectOnlyPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php
$automobileCoveragePremium = $model->liabilityCoverages->getAutomobileCoveragePremium();
if ($automobileCoveragePremium > 0) {
    ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('automobile_coverage') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('automobile_coverage') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($automobileCoveragePremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php if ($model->liabilityCoverages->acquired_entities): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('acquired_entities') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('acquired_entities') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getAcquiredEntitiesPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->all_hazards): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('all_hazards') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('all_hazards') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getAllHazardsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->a_d_p_b): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('a_d_p_b') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('a_d_p_b') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getADPBPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->athletic_participants): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('athletic_participants') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('athletic_participants') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getAthleticParticipantsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->certain_skin_care_service): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('certain_skin_care_service') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('certain_skin_care_service') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getCertainSkinCareServicePremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->certain_skin_care_service_a): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('certain_skin_care_service_a') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('certain_skin_care_service_a') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getCertainSkinCareServiceAPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->discrimination_clarification): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('discrimination_clarification') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('discrimination_clarification') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getDiscriminationClarificationPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->employment_practices): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('employment_practices') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('employment_practices') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getEmploymentPracticesPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->fairs): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('fairs') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('fairs') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getFairsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->known_loss_damage): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('known_loss_damage') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('known_loss_damage') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getKnownLossDamagePremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->dry_cleaning_damage): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('dry_cleaning_damage') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('dry_cleaning_damage') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getDryCleaningDamagePremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->liquor_liability): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('liquor_liability') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('liquor_liability') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getLiquorLiabilityPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->operations): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('operations') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('operations') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getOperationsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->saddle_animals): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('saddle_animals') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('saddle_animals') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getSaddleAnimalsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->ice_control_operations): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('ice_control_operations') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('ice_control_operations') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getIceControlOperationsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php if ($model->liabilityCoverages->ice_control_operations): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('ice_control_operations') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('ice_control_operations') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getIceControlOperationsPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>
    <!-- BU104 -->
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('exclusion_canine_related_injuries_damages') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('exclusion_canine_related_injuries_damages') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getExclusionCanineRelatedInjuriesDamagesPremium()) ?></td>
        <td></td>
    </tr>

<?php if ($model->liabilityCoverages->extended_pollution_exclusion): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('extended_pollution_exclusion') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('extended_pollution_exclusion') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getExtendedPollutionExclusionPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php
$fireLegalPremium = $model->liabilityCoverages->getFireLegalPremium();
if ($fireLegalPremium != 0) {
    ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('fire_legal') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('fire_legal') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($fireLegalPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$automobileCoverageAPremium = $model->liabilityCoverages->getAutomobileCoverageAPremium();
if ($automobileCoverageAPremium > 0) {
    ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('automobile_coverage_a') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('automobile_coverage_a') ?></td>
        <td><?= $model->liabilityCoverages->getAutomobileCoverageALimit() ?></td>
        <td><?= Yii::$app->formatter->asCurrency($automobileCoverageAPremium) ?></td>
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
if ($liquorLiabilityReceiptsPremium != 0) {
    ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('liquor_liability_receipts') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('liquor_liability_receipts') ?></td>
        <td><?= $model->liabilityCoverages->getLiquorLiabilityReceiptsLimit() ?></td>
        <td><?= Yii::$app->formatter->asCurrency($liquorLiabilityReceiptsPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

    <tr>
        <td>*</td>
        <td colspan="2">Medical Payments</td>
        <td><?= $model->liabilityCoverages->getMedicalPaymentsLimit() ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getMedicalPaymentsPremium()) ?></td>
        <td></td>
    </tr>

<?php if ($model->liabilityCoverages->getPersonalInjuryApplies()): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('personal_injury') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('personal_injury') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getPersonalInjuryPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>

<?php
$poolLiabilityPremium = $model->liabilityCoverages->getPoolLiabilityPremium();
if ($poolLiabilityPremium > 0) {
    ?>
    <tr>
        <td></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('pool_liability') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($poolLiabilityPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$completedOperationsPremium = $model->liabilityCoverages->getCompletedOperationsPremium();
if ($completedOperationsPremium != 0) {
    ?>
    <tr>
        <td></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('completed_operations') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($completedOperationsPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php if (!$model->liabilityCoverages->water_damage_exclusion): ?>
    <tr>
        <td><?= $model->liabilityCoverages->getFormNumber('water_damage_exclusion') ?></td>
        <td colspan="2"><?= $model->liabilityCoverages->getAttributeLabel('water_damage_exclusion') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->liabilityCoverages->getWaterDamageExclusionPremium()) ?></td>
        <td></td>
    </tr>
<?php endif; ?>