<?php
use yii\helpers\Url;
?>
<h3><?= $subject ?></h3>

<p><?= Yii::t("user", "Welcome to our system.Your credentials:") ?></p>

<p>Login: <?=$login;?></p>

<p>Password: <?=$password;?></p>

<p><a href="<?php echo $_SERVER['SERVER_NAME'];?>"> Follow this link to login </a></p>
