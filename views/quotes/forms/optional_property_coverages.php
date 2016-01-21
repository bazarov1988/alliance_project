<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OptionalPropertyCoverages */
/* @var $form ActiveForm */
?>
<br />
<div class="quotes-optional_property_coverages">

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><?= Yii::t('app','Form #')?></th>
            <th><?= Yii::t('app','Form Title')?></th>
            <th><?= Yii::t('app','Standard')?></th>
            <th><?= Yii::t('app','Deluxe')?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> * </td>
            <td><?= $form->field($model, 'accounts_receivable'); ?></td>
            <td>none</td>
            <td>$1000</td>
        </tr>
        <tr>
            <td> * </td>
            <td><?= $form->field($model, 'additional_expense'); ?></td>
            <td>$1000</td>
            <td>$1000</td>
        </tr>
<!--        <tr>-->
<!--            <td>SF-105</td>-->
<!--            <td>--><?//= $form->field($model, 'alcoholic_beverages_tax_exclusion')->checkbox() ?><!--</td>-->
<!--            <td>none</td>-->
<!--            <td>none</td>-->
<!--        </tr>-->
        <tr></tr>
        <tr>
            <td>*</td>
            <td><?= $form->field($model, 'building_inflation_protection')->dropDownList(Yii::$app->params['quote']['building_inflation_protection']) ?></td>
            <td>none</td>
            <td>1%</td>
        </tr>
        <tr>
            <td>SF-28A</td>
            <td><?= $form->field($model, 'businessowners_agreed_amount')->checkbox() ?></td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-55</td>
            <td><?= $form->field($model, 'businessowners_burglary_robbery') ?></td>
            <td>none</td>
            <td>SF-4</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <?= Html::activeHiddenInput($model, 'cause_of_loss_building_roof') ?>
                <?= $form->field($model, 'cause_of_loss_building')->dropDownList(Yii::$app->params['quote']['cause_of_loss_building']) ?>
            </td>
            <td>SF-1</td>
            <td>SF-3</td>
        </tr>
        <tr>
            <td></td>
            <td><?= $form->field($model, 'cause_of_loss_business_property')->dropDownList(Yii::$app->params['quote']['cause_of_loss_business_property']) ?></td>
            <td>SF-1</td>
            <td>SF-4</td>
        </tr>
        <tr>
            <td>MR-61A</td>
            <td>
                <?= $form->field($model, 'computer_coverage') ?>
                <?= $form->field($model, 'deductible')->dropDownList(Yii::$app->params['quote']['deductible']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr></tr>
        <tr>
            <td>SF-91</td>
            <td>
                <?= $form->field($model, 'cooking_protection_equip')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-132</td>
            <td>
                <?= $form->field($model, 'customers_goods') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-101</td>
            <td>
                <span>Demolition/Debris Removal Cov.</span>
                <?= $form->field($model, 'agreement_one') ?>
                <?= $form->field($model, 'agreement_two') ?>
                <?= $form->field($model, 'agreement_three') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr></tr>
        <tr>
            <td>SF-398</td>
            <td>
                <span>Earthquake Coverage</span>
                <?= $form->field($model, 'building_limit') ?>
                <?= $form->field($model, 'bus_prop_limit') ?>
                <?= $form->field($model, 'masonry_veneer')->radioList(Yii::$app->params['quote']['yes_no']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'employee_dishonesty') ?>
            </td>
            <td>none</td>
            <td>$1000</td>
        </tr>
        <tr>
            <td>SF-345</td>
            <td>
                <?= $form->field($model, 'equipment_breakdown')->checkbox() ?>
            </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'exterior_signs') ?>
            </td>
            <td>none</td>
            <td>$1000</td>
        </tr>
        <tr>
            <td>SF-33</td>
            <td>
                <?= $form->field($model, 'cost_provision')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr></tr>
        <tr></tr>

        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'loss_off_income_month') ?>
            </td>
            <td>3 mos.</td>
            <td>6 mos.</td>
        </tr>
        <tr>
            <td>SF-312</td>
            <td>
                <?= $form->field($model, 'loss_of_income')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-312A</td>
            <td>
                <?= $form->field($model, 'loss_of_income_sf')->checkbox() ?>
                <?= $form->field($model, 'building_increment')->dropDownList(Yii::$app->params['quote']['building_increment']) ?>
                <?= $form->field($model, 'bus_prop_increment')->dropDownList(Yii::$app->params['quote']['bus_prop_increment']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-127</td>
            <td>
                <?= $form->field($model, 'loss_payable')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'money_securities') ?>
            </td>
            <td>none</td>
            <td>$1000</td>
        </tr>
        <tr>
            <td></td>
            <td>
                Off Premises Power Clause
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>SF-94A</td>
            <td>
                <?= $form->field($model, 'direct_damages') ?>
                <?= $form->field($model, 'damages_transmission_lines')->dropDownList(Yii::$app->params['quote']['damages_transmission_lines']) ?>
                <?= $form->field($model, 'damages_deductible')->dropDownList(Yii::$app->params['quote']['deductible']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>SF-95A</td>
            <td>
                <?= $form->field($model, 'time_element') ?>
                <?= $form->field($model, 'time_transmission_lines')->dropDownList(Yii::$app->params['quote']['time_transmission_lines']) ?>
                <?= $form->field($model, 'time_deductible')->dropDownList(Yii::$app->params['quote']['deductible']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
    <tr></tr>
        <tr>
            <td>SF-47</td>
            <td>
                <span>Ordinance and Law</span>
                <?= $form->field($model, 'demolition_amount') ?>
                <?= $form->field($model, 'increased_cost')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-78</td>
            <td>
                <?= $form->field($model, 'building_glass') ?>
                <?= $form->field($model, 'curved')->checkbox() ?>
                <?= $form->field($model, 'plates')->checkbox() ?>
                <?= $form->field($model, 'ornamental_work') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>SF-93</td>
            <td>
                <?= $form->field($model, 'refrigerated_food') ?>
                <?= $form->field($model, 'food_deductible')->dropDownList(Yii::$app->params['quote']['deductible']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>SF-106</td>
            <td>
                <?= $form->field($model, 'refrigerated_property') ?>
                <?= $form->field($model, 'refrigerated_property_deductible')->dropDownList(Yii::$app->params['quote']['deductible']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'season_variation')->checkbox() ?>
                <?= $form->field($model, 'add_mos') ?>
                <?= $form->field($model, 'number_of_additional')->dropDownList(Yii::$app->params['quote']['number_of_additional']) ?>
            </td>
            <td>none</td>
            <td>90 days</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'sprinkler_leakage')->checkbox() ?>
                <?= $form->field($model, 'add_increment')->dropDownList(Yii::$app->params['quote']['add_increment']) ?>
            </td>
            <td>none</td>
            <td>50%</td>
        </tr>
        <tr>
            <td>SF-58B</td>
            <td>
                <?= $form->field($model, 'storekeepers_burglary_robbery')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\BurglaryAndRobbery::find()->all(), 'id', 'name'),['prompt'=>'Select']) ?>
                <?= $form->field($model, 'storekeepers_burglary_robbery_deductible')->dropDownList(Yii::$app->params['quote']['deductible']) ?>
                <?= $form->field($model, 'burglary_of_money') ?>
                <?= $form->field($model, 'theft_of_money') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>SF-135</td>
            <td>
                <?= $form->field($model, 'tenant_Improvements_one') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>SF-135A</td>
            <td>
                <?= $form->field($model, 'tenant_Improvements_a') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'valuable_papers') ?>
            </td>
            <td>none</td>
            <td>$1000</td>
        </tr>

        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'insured_premises')->checkbox() ?>
                <?= $form->field($model, 'insured_premises_ten')->dropDownList(Yii::$app->params['quote']['insured_premises_ten']) ?>
            </td>
            <td>none</td>
            <td>15%</td>
        </tr>
        <tr>
            <td>SF-133A</td>
            <td>
                <?= $form->field($model, 'insured_premises_a')->checkbox() ?>
                <?= $form->field($model, 'insured_premises_a_ten')->dropDownList(Yii::$app->params['quote']['insured_premises_a_ten']) ?>
            </td>
            <td>none</td>
            <td>none<td>
        </tr>

        <tr>
	        <td>SF-500</td>
	        <td>
		        <?= $form->field($model, 'sf_500')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-519</td>
	        <td>
		        <?= $form->field($model, 'sf_519')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-513</td>
	        <td>
		        <?= $form->field($model, 'sf_513_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-514</td>
	        <td>
		        <?= $form->field($model, 'sf_514_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-515</td>
	        <td>
		        <?= $form->field($model, 'sf_515_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-520</td>
	        <td>
		        <?= $form->field($model, 'sf_520_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-102</td>
	        <td>
		        <?= $form->field($model, 'sf_102_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-32</td>
	        <td>
		        <?= $form->field($model, 'sf_32_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-349</td>
	        <td>
		        <?= $form->field($model, 'sf_349_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none<td>
        </tr>
        <tr>
	        <td>SF-103</td>
	        <td>
		        <?= $form->field($model, 'sf_103_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none</td>
        </tr>
        <tr>
	        <td>SF-10b</td>
	        <td>
		        <?= $form->field($model, 'sf_10b_value')->checkbox() ?>
	        </td>
	        <td>none</td>
	        <td>none</td>
        </tr>
        </tbody>
    </table>
</div><!-- quotes-optional_property_coverages -->
