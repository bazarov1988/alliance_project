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
    <td>Optional Coverages</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td>Special</td>
</tr>
<tr>
    <td>Form #</td>
    <td>Form Title</td>
    <td> </td>
    <td>Limit</td>
    <td>Premium</td>
    <td>Ded</td>
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
<tr>
    <td></td>
    <td>Optional Liability Coverages</td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td></td>
</tr>
<tr>
    <td>LS-19</td>
    <td>Additional Insured </td>
    <td> </td>
    <td> </td>
    <td>$16.00</td>
    <td></td>
</tr>
<tr>
    <td>LS-44</td>
    <td>Beauty or Barber Shop Liability</td>
    <td> </td>
    <td>$1,000,000 / $2,000,000</td>
    <td>$48.00</td>
    <td></td>
</tr>
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