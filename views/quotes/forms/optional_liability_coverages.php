<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OptionalLiabilityCoverages */
/* @var $form ActiveForm */
?>
<br />
<div class="quotes-optional_liability_coverages">


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
            <td> LS-6 </td>
            <td><?= $form->field($model, 'liability_form')->dropDownList(Yii::$app->params['quote']['liability_form']) ?></td>
            <td>LS-1</td>
            <td>LS-5</td>
        </tr>

        <tr>
            <td> LS-22 </td>
            <td>
                <?= $form->field($model, 'additional_insured')->dropDownList(Yii::$app->params['quote']['additional_insured']) ?>
                <?= $form->field($model, 'additional_insured_number') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>LS-24</td>
            <td>
                <?= $form->field($model, 'add_insured_owners_lessees')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>LS-24A</td>
            <td>
                <?= $form->field($model, 'add_insured_owners_contactors')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>LS-73</td>
            <td>
                <?= $form->field($model, 'battery_exclusion')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>LS-44</td>
            <td>
                <?= $form->field($model, 'barber_shop_liability')->dropDownList(Yii::$app->params['quote']['barber_shop_liability']) ?>
                <span>Beauty Shop Employees</span>
                <?= $form->field($model, 'emploees_full_time') ?>
                <?= $form->field($model, 'emploees_part_time') ?>
                <?= $form->field($model, 'emploees_barbers_time') ?>
                <?= $form->field($model, 'emploees_manicurists') ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-70</td>
            <td>
                <?= $form->field($model, 'designated_premises')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-92</td>
            <td>
                <?= $form->field($model, 'contractual_liability_limitation')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-70A</td>
            <td>
                <?= $form->field($model, 'project_only')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-46</td>
            <td>
                <?= $form->field($model, 'automobile_coverage')->dropDownList(Yii::$app->params['quote']['automobile_coverage']) ?>
                <?= $form->field($model, 'automobile_coverage_agregate')->dropDownList(Yii::$app->params['quote']['agregate']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-91</td>
            <td>
                <?= $form->field($model, 'acquired_entities')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-17</td>
            <td>
                <?= $form->field($model, 'all_hazards')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-87</td>
            <td>
                <?= $form->field($model, 'a_d_p_b')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-14</td>
            <td>
                <?= $form->field($model, 'athletic_participants')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-76</td>
            <td>
                <?= $form->field($model, 'certain_skin_care_service')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-76A</td>
            <td>
                <?= $form->field($model, 'certain_skin_care_service_a')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-88</td>
            <td>
                <?= $form->field($model, 'discrimination_clarification')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-93</td>
            <td>
                <?= $form->field($model, 'employment_practices')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-36</td>
            <td>
                <?= $form->field($model, 'fairs')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-85</td>
            <td>
                <?= $form->field($model, 'known_loss_damage')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-15</td>
            <td>
                <?= $form->field($model, 'dry_cleaning_damage')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-31</td>
            <td>
                <?= $form->field($model, 'liquor_liability')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-18</td>
            <td>
                <?= $form->field($model, 'operations')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-72</td>
            <td>
                <?= $form->field($model, 'saddle_animals')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-79</td>
            <td>
                <?= $form->field($model, 'ice_control_operations')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>LS-89</td>
            <td>
                <?= $form->field($model, 'extended_pollution_exclusion')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'fire_legal') ?>
                <?= $form->field($model, 'fire_legal_settlement')->dropDownList(Yii::$app->params['quote']['fire_legal_settlement'],['prompt'=>'Select']) ?>
            </td>
            <td>$50,000</td>
            <td>$50,000</td>
        </tr>

        <tr>
            <td>LS-50A</td>
            <td>
                <?= $form->field($model, 'automobile_coverage_a')->dropDownList(Yii::$app->params['quote']['automobile_coverage_a']) ?>
                <?= $form->field($model, 'automobile_coverage_agregate_a')->dropDownList(Yii::$app->params['quote']['agregate']) ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>LS-34</td>
            <td>
                <span>Liquor Liability</span>
                <?= $form->field($model, 'liquor_liability_receipts') ?>
                <?= $form->field($model, 'liquor_liability_restaurant')->dropDownList(Yii::$app->params['quote']['liquor_liability_restaurant']) ?>
                <?= $form->field($model, 'liquor_liability_limit')->dropDownList(Yii::$app->params['quote']['liquor_liability_limit']) ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'personal_injury')->checkbox() ?>
            </td>
            <td>none</td>
            <td>included</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'pool_liability')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>
        <tr>
            <td>*</td>
            <td>
                <?= $form->field($model, 'completed_operations')->checkbox() ?>
            </td>
            <td>Automatic</td>
            <td>Automatic</td>
        </tr>

        <tr>
            <td>LS-75</td>
            <td>
                <?= $form->field($model, 'water_damage_exclusion')->checkbox() ?>
                <?= $form->field($model, 'water_damage_exclusion_apartments') ?>
                <?= $form->field($model, 'water_damage_exclusion_offices_in_ah') ?>
                <?= $form->field($model, 'water_damage_exclusion_offices_in_ob') ?>
                <?= $form->field($model, 'water_damage_exclusion_store_in_ah')->checkbox() ?>
                <?= $form->field($model, 'water_damage_exclusion_store_in_ob')->checkbox() ?>
            </td>
            <td>none</td>
            <td>none</td>
        </tr>

        <tr>
	        <td>LS-75</td>
	        <td>
		        <?= $form->field($model, 'ls_46_liability')->dropDownList(Yii::$app->params['quote']['ls46_coverage']['liability']) ?>
		        <?= $form->field($model, 'ls_46_value') ?>

	        </td>
	        <td>none</td>
	        <td>none</td>
        </tr>
        </tbody>
    </table>
</div><!-- quotes-optional_liability_coverages -->
