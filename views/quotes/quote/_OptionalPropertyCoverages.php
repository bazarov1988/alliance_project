
<?php
$receivablePremium = $model->propertyCoverages->getAccountsReceivablePremium();
if ($receivablePremium >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('accounts_receivable') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('accounts_receivable') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($receivablePremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$additionalExpense = $model->propertyCoverages->getAdditionalExpensePremium();
if ($additionalExpense >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('additional_expense') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('additional_expense') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($additionalExpense) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$buildingInflation = $model->propertyCoverages->getBuildingInflationProtectionPremium();
if ($buildingInflation >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('building_inflation_protection') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('building_inflation_protection') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($buildingInflation) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$burglaryRobbery = $model->propertyCoverages->getBusinessownersBurglaryRobberyPremium();
if ($burglaryRobbery >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('businessowners_burglary_robbery') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('businessowners_burglary_robbery') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($burglaryRobbery) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$causeOfLossBuilding = $model->propertyCoverages->getCauseOfLossBuildingPremium();
if ($causeOfLossBuilding >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cause_of_loss_building') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('cause_of_loss_building') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getCauseOfLossBuildingLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($causeOfLossBuilding) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bldg')?></td>
    </tr>
<?php
}
?>

<?php
$causeOfLossBP = $model->propertyCoverages->getCauseOfLossBPPremium();
if ($causeOfLossBP >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cause_of_loss_business_property') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('cause_of_loss_business_property') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getCauseOfLossBPLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($causeOfLossBP) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$computerCoverage = $model->propertyCoverages->getComputerCoveragePremium();
if ($computerCoverage >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('computer_coverage') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('computer_coverage') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getComputerCoverageLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($computerCoverage) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'deductible')?></td>
    </tr>
<?php
}
?>


<?php
$cookingProtectionInitial = $model->propertyCoverages->getCookingProtectionInitialPremium();
if ($cookingProtectionInitial >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cooking_protection_equip') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('cooking_protection_equip') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($cookingProtectionInitial) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$customersGoods = $model->propertyCoverages->getCustomersGoodsPremium();
if ($customersGoods >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('customers_goods') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('customers_goods') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getCustomersGoodsLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($customersGoods) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$demolitionDebris = $model->propertyCoverages->getDemolitionDebrisPremium();
if ($demolitionDebris >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('demolition_debris') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('demolition_debris') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($demolitionDebris) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bldg')?></td>
    </tr>
<?php
}
?>

<?php
$earthquakeCoverage = $model->propertyCoverages->getEarthquakeCoveragePremium();
if ($earthquakeCoverage >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('earthquake_coverage') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('earthquake_coverage') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($earthquakeCoverage) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$employee = $model->propertyCoverages->getEmployeePremium();
if ($employee >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('employee_dishonesty') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('employee_dishonesty') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($employee) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$equipmentBreakdown = $model->propertyCoverages->getEquipmentBreakdownPremiumSum();
if ($equipmentBreakdown >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('equipment_breakdown') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('equipment_breakdown') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($equipmentBreakdown) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$exteriorSigns = $model->propertyCoverages->getExteriorSignsPremium();
if ($exteriorSigns >= 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('exterior_signs') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('exterior_signs') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($exteriorSigns) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php /* --------------------------------------------------------------------------------------------------------- */ ?>

<?php
$sprinklerLeakagePremium = $model->propertyCoverages->getSprinklerLeakagePremium();
if ($sprinklerLeakagePremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('sprinkler_leakage') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('sprinkler_leakage') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($sprinklerLeakagePremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$storekeepersBurglaryRobberyPremium = $model->propertyCoverages->getStorekeepersBurglaryRobberyTotalPremium();
if ($storekeepersBurglaryRobberyPremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('storekeepers_burglary_robbery') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('storekeepers_burglary_robbery') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($storekeepersBurglaryRobberyPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$tenantImprovementsPremium = $model->propertyCoverages->getTenantImprovementsPremium();
if ($tenantImprovementsPremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('tenant_Improvements_one') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('tenant_Improvements_one') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($tenantImprovementsPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$tenantImprovementsAPremium = $model->propertyCoverages->getTenantImprovementsAPremium();
if ($tenantImprovementsAPremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('tenant_Improvements_a') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('tenant_Improvements_a') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($tenantImprovementsAPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$valuablePapersPremium = $model->propertyCoverages->getValuablePapersPremium();
if ($valuablePapersPremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('valuable_papers') ?></td>
        <td><?= $model->propertyCoverages->getAttributeLabel('valuable_papers') ?></td>
        <td></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($valuablePapersPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

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