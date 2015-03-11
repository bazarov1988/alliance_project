<?php

use yii\db\Schema;
use yii\db\Migration;

class m150311_143312_irpm_fields extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `bop_rater_entry` ADD `irpm_type` TINYINT NULL AFTER `each_person_accident` ,ADD `irpm_percent` INT NULL AFTER `irpm_type` ;");
        return true;
    }

    public function down()
    {
        echo "m150311_143312_irpm_fields cannot be reverted.\n";

        return true;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
