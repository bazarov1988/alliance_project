<table class="table table-bordered">
<thead>
<tr>
    <th class="bg-gray"><strong>Forms and Endorsements</strong></th>
</tr>
</thead>
<tbody>
<tr>
    <td>SF-20, SF-311, SF-4A (B.P.), LS-5, LS-373, SF-10S
        <br>This is a reference to the forms listed above (A23-A29)
    </td>
</tr>
</tbody>
</table>

<table class="table table-bordered table-totals">
<tbody>
<tr>
    <td class="bg-gray"><strong>Premium</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getPremium());?></td>
</tr>
<tr>
    <td class="bg-gray"><strong>IRPM</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getIRPM());?></td>
</tr>
<tr>
    <td class="bg-gray"><strong>Total Premium</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getPremiumTotal());?></td>
</tr>
<tr>
    <td class="bg-gray"><strong>Fire Fee</strong></td>
    <td><?= Yii::$app->formatter->asCurrency($model->getFireFree());?></td>
</tr>
</tbody>
</table>