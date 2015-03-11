<table class="table table-bordered">
<tbody>
<tr>
    <td class="bg-gray"><strong>Forms and Endorsements</strong></td>
    <td></td>

</tr>
<tr>
    <td>SF-20, SF-311, SF-4A (B.P.), LS-5, LS-373, SF-10S</td>
    <td>This is a reference to the forms listed above (A23-A29)</td>

</tr>
<tr>
    <td>, SF-345, LS-19, LS-44</td>

</tr>
</tbody>
</table>
<table class="table table-bordered">
<tbody>
<tr>
    <td><strong>Premium</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getPremium());?></td>
    <td>total of premiums</td>
</tr>
<tr>
    <td><strong>IRPM</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getIRPM());?></td>
    <td>IRPM Credits from help area like 1-10%</td>
</tr>
<tr>
    <td><strong>Total Premium</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getPremiumTotal());?></td>
    <td>Total of Premium - IRPM Amount</td>
</tr>
<tr>
    <td><strong>Fire Fee</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getFireFree());?></td>
    <td>Auto based on territory</td>
</tr>
</tbody>
</table>