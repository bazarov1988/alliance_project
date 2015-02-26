<?php
use yii\helpers\Url;
?>
<h3><?= $subject ?></h3>

<p><?= Yii::t("user", "New quote {quote} has been saved.",['quote'=>'<strong>'.$name.'</strong>']) ?></p>

<p>User: <?=$user;?></p>

<p>Date: <?=$date;?></p>


