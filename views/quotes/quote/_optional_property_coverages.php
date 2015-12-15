<?php
$receivablePremium = $model->propertyCoverages->getAccountsReceivablePremium();
if ($receivablePremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('accounts_receivable') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('accounts_receivable') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->accounts_receivable) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($receivablePremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$additionalExpense = $model->propertyCoverages->getAdditionalExpensePremium();
if ($additionalExpense > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('additional_expense') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('additional_expense') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->additional_expense) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($additionalExpense) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
//if (!empty($model->propertyCoverages->alcoholic_beverages_tax_exclusion)) {
//    ?>
<!--    <tr>-->
<!--        <td>--><?//= $model->propertyCoverages->getFormNumber('alcoholic_beverages_tax_exclusion') ?><!--</td>-->
<!--        <td colspan="2">--><?//= $model->propertyCoverages->getAttributeLabel('alcoholic_beverages_tax_exclusion') ?><!--</td>-->
<!--        <td></td>-->
<!--        <td></td>-->
<!--        <td></td>-->
<!--    </tr>-->
<?php
//}
//?>

<?php
if (!empty($model->propertyCoverages->businessowners_agreed_amount)) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('businessowners_agreed_amount') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('businessowners_agreed_amount') ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$buildingInflation = $model->propertyCoverages->getBuildingInflationProtectionPremium();
if ($buildingInflation > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('building_inflation_protection') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('building_inflation_protection') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($buildingInflation) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$burglaryRobbery = $model->propertyCoverages->getBusinessownersBurglaryRobberyPremium();
if ($burglaryRobbery > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('businessowners_burglary_robbery') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('businessowners_burglary_robbery') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->businessowners_burglary_robbery);?></td>
        <td><?= Yii::$app->formatter->asCurrency($burglaryRobbery) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$causeOfLossBuilding = $model->propertyCoverages->getCauseOfLossBuildingPremium();
if ($causeOfLossBuilding != 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cause_of_loss_building') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('cause_of_loss_building') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getCauseOfLossBuildingLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($causeOfLossBuilding) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$causeOfLossBP = $model->propertyCoverages->getCauseOfLossBPPremium();
if ($causeOfLossBP != 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cause_of_loss_business_property') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('cause_of_loss_business_property') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getCauseOfLossBPLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($causeOfLossBP) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$computerCoverage = $model->propertyCoverages->getComputerCoveragePremium();
if ($computerCoverage > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('computer_coverage') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('computer_coverage') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getComputerCoverageLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($computerCoverage) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'deductible')?></td>
    </tr>
<?php
}
?>


<?php
$cookingProtectionInitial = $model->propertyCoverages->getCookingProtectionPremium();
if ($cookingProtectionInitial > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cooking_protection_equip') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('cooking_protection_equip') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($cookingProtectionInitial) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$customersGoods = $model->propertyCoverages->getCustomersGoodsPremium();
if ($customersGoods > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('customers_goods') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('customers_goods') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getCustomersGoodsLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($customersGoods) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
$demolitionDebris = $model->propertyCoverages->getDemolitionDebrisPremium();
if ($demolitionDebris > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('demolition_debris') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('demolition_debris') ?> <div style="float: right"><?= $model->propertyCoverages->getAttributeLabel('agreement_one') ?></div></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->agreement_one);?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getDDAggr_1_premium()) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bldg')?></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><div style="float: right"><?= $model->propertyCoverages->getAttributeLabel('agreement_two') ?></div></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->agreement_two);?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getDDAggr_2_premium()) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bldg')?></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><div style="float: right"><?= $model->propertyCoverages->getAttributeLabel('agreement_three') ?></div></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->agreement_three);?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getDDAggr_3_premium()) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bldg')?></td>
    </tr>
<?php
}
?>

<?php
$earthquakeCoverage = $model->propertyCoverages->getEarthquakeCoveragePremium();
if ($earthquakeCoverage > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('earthquake_coverage') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('earthquake_coverage') ?><div style="float: right"><?= $model->propertyCoverages->getAttributeLabel('building_limit') ?></div></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getEBuildingLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getEBuildingPremium()) ?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><div style="float: right"><?= $model->propertyCoverages->getAttributeLabel('bus_prop_limit') ?></div></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getEBPLimit());?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->getEBPPremium()) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$employee = $model->propertyCoverages->getEmployeePremium();
if ($employee > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('employee_dishonesty') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('employee_dishonesty') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->employee_dishonesty) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($employee) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$equipmentBreakdown = $model->propertyCoverages->getEquipmentBreakdownPremium();
if ($model->propertyCoverages->equipment_breakdown) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('equipment_breakdown') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('equipment_breakdown') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($equipmentBreakdown) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$exteriorSigns = $model->propertyCoverages->getExteriorSignsPremium();
if ($exteriorSigns > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('exterior_signs') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('exterior_signs') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->exterior_signs) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($exteriorSigns) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model,'deductible_bp')?></td>
    </tr>
<?php
}
?>

<?php
if (!empty($model->propertyCoverages->cost_provision)) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('cost_provision') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('cost_provision') ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$lossOffIncomeMonth = $model->propertyCoverages->getLoss_off_IncomeMonthPremium();
if ($lossOffIncomeMonth > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('loss_off_income_month') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('loss_off_income_month') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($lossOffIncomeMonth) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
if (!empty($model->propertyCoverages->loss_of_income)) {
    $lossOffIncome= $model->propertyCoverages->getLoss_off_IncomePremium();
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('loss_of_income') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('loss_of_income') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($lossOffIncome) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
if (!empty($model->propertyCoverages->loss_of_income_sf)) {
    $lossOffIncomeA= $model->propertyCoverages->getLoss_off_IncomeATotal();
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('loss_of_income_sf') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('loss_of_income_sf') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($lossOffIncomeA) ?></td>
        <td></td>
    </tr>
<?php
}
?>


<?php
if (!empty($model->propertyCoverages->loss_payable)) {
    $lossPayable= $model->propertyCoverages->getLossPayablePremium();
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('loss_payable') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('loss_payable') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($lossPayable) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$moneySecurities = $model->propertyCoverages->getMoneySecuritiesPremium();
if ($moneySecurities > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('money_securities') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('money_securities') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->money_securities) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($moneySecurities) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$directDamages = $model->propertyCoverages->getDirectDamagesPremium();
if ($directDamages > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('direct_damages') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('direct_damages') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->direct_damages) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($directDamages) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'damages_deductible')?></td>
    </tr>
<?php
}
?>

<?php
$timeElement = $model->propertyCoverages->getTimeElementPremium();
if ($timeElement > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('time_element') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('time_element') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->time_element) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($timeElement) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'time_deductible')?></td>
    </tr>
<?php
}
?>


<?php /* --------------------------------------------------------------------------------------------------------- */ ?>

<?php
$ordinanceAndLawPremium = $model->propertyCoverages->getOrdinanceAndLawPremium();
if ($ordinanceAndLawPremium > 0) {
    ?>
    <tr>
        <td>SF-47</td>
        <td colspan="2">Ordinance and Law</td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($ordinanceAndLawPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$buildingGlassPremium = $model->propertyCoverages->getBuildingGlassPremium();
if ($buildingGlassPremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('building_glass') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('building_glass') ?></td>
        <td><?= $model->propertyCoverages->building_glass ?></td>
        <td><?= Yii::$app->formatter->asCurrency($buildingGlassPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$refrigeratedFoodPremium = $model->propertyCoverages->getRefrigeratedFoodPremium();
if ($model->propertyCoverages->refrigerated_food) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('refrigerated_food') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('refrigerated_food') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->refrigerated_food) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($refrigeratedFoodPremium) ?></td>
        <td><?php echo Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'food_deductible')?></td>
    </tr>
<?php
}
?>

<?php
$refrigeratedPropertyPremium = $model->propertyCoverages->getRefrigeratedPropertyPremium();
if ($refrigeratedPropertyPremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('refrigerated_property') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('refrigerated_property') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($refrigeratedPropertyPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$seasonVariationPremium = $model->propertyCoverages->getSeasonVariationPremium();
if (!empty($model->propertyCoverages->season_variation)) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('season_variation') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('season_variation') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($seasonVariationPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>

<?php
$sprinklerLeakagePremium = $model->propertyCoverages->getSprinklerLeakagePremium();
if ($sprinklerLeakagePremium > 0) {
    ?>
    <tr>
        <td><?= $model->propertyCoverages->getFormNumber('sprinkler_leakage') ?></td>
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('sprinkler_leakage') ?></td>
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
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('storekeepers_burglary_robbery') ?></td>
        <td><?= Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'storekeepers_burglary_robbery') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($storekeepersBurglaryRobberyPremium) ?></td>
        <td><?= Yii::$app->quote->getValueByAttribute($model->propertyCoverages,'storekeepers_burglary_robbery_deductible')?></td>
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
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('tenant_Improvements_one') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->tenant_Improvements_one) ?></td>
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
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('tenant_Improvements_a') ?></td>
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
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('valuable_papers') ?></td>
        <td><?= Yii::$app->formatter->asCurrency($model->propertyCoverages->valuable_papers) ?></td>
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
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('insured_premises') ?></td>
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
        <td colspan="2"><?= $model->propertyCoverages->getAttributeLabel('insured_premises_a') ?></td>
        <td></td>
        <td><?= Yii::$app->formatter->asCurrency($insuredPremisesAPremium) ?></td>
        <td></td>
    </tr>
<?php
}
?>



<?php
$bopExtenderEndorsement = $model->propertyCoverages->getBusinessExtender();
if ($bopExtenderEndorsement) {
	?>
	<tr>
		<td>SF-500</td>
		<td colspan="2">BOP EXTENDER ENDORSEMENT</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($bopExtenderEndorsement) ?></td>
		<td></td>
	</tr>
<?php
}
?>

<?php
$bopExtenderEndorsement = $model->propertyCoverages->getBopExtenderEndorsement();
if ($bopExtenderEndorsement) {
	?>
	<tr>
		<td>SF-519</td>
		<td colspan="2">
			BOP EXTENDER-TO BE USED ON RESTAURANTS AND SIMILAR TYPE RISKS
		</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($bopExtenderEndorsement) ?></td>
		<td></td>
	</tr>
<?php
}
?>

<?php
$bopExtenderEndorsements = $model->propertyCoverages->getBopExtenderEndorsements();
if ($bopExtenderEndorsements) {
	?>
	<tr>
		<td>SF-513, 514, 515</td>
		<td colspan="2">BOP EXTENDER ENDORSEMENTS</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($bopExtenderEndorsements) ?></td>
		<td></td>
	</tr>
<?php
}
?>



<?php
$hotelModelExtender = $model->propertyCoverages->getHotelMotelExtender();
if ($hotelModelExtender) {
	?>
	<tr>
		<td>SF-520</td>
		<td colspan="2">HOTEL/MOTEL EXTENDER</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($hotelModelExtender) ?></td>
		<td></td>
	</tr>
<?php
}
?>

<?php
$increasedCostOfConstruction = $model->propertyCoverages->getIncreasedCostOfConstruction();
if ($increasedCostOfConstruction) {
	?>
	<tr>
		<td>SF-103</td>
		<td colspan="2">
			INCREASED COST OF CONSTRUCTION. COVERAGE FOR ENFORCEMENT OF BUILDING CODES
		</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($increasedCostOfConstruction) ?></td>
		<td></td>
	</tr>
<?php
}
?>

<?php
$optionalTimeDeductible = $model->propertyCoverages->optionalTimeDeductible();
if ($optionalTimeDeductible) {
	?>
	<tr>
		<td>SF-349</td>
		<td colspan="2">
			OPTIONAL TIME DEDUCTIBLE (CONSEQUENTIAL LOSS)
		</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($optionalTimeDeductible) ?></td>
		<td></td>
	</tr>
<?php
}
?>

<?php
$demolitionCoverage = $model->propertyCoverages->getDemolitionCoverage();
if ($demolitionCoverage) {
	?>
	<tr>
		<td>SF-102</td>
		<td colspan="2">
			DEMOLITION COVERAGE-COVERAGE A-BUILDING-Scheduled amount of coverage
		</td>
		<td></td>
		<td><?= Yii::$app->formatter->asCurrency($demolitionCoverage) ?></td>
		<td></td>
	</tr>
<?php
}
?>

