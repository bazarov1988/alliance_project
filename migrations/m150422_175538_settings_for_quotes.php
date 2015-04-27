<?php

use yii\db\Schema;
use yii\db\Migration;

class m150422_175538_settings_for_quotes extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `bop_rater_entry` ADD `any_loses` SMALLINT NULL DEFAULT NULL AFTER `irpm_percent` ,
                        ADD `prior_underwriting` SMALLINT NULL DEFAULT NULL AFTER `any_loses` ,
                        ADD `prior_underwriting_details` TEXT NULL DEFAULT NULL AFTER `prior_underwriting` ,
                        ADD `half_mile_location` SMALLINT NULL DEFAULT NULL AFTER `prior_underwriting_details` ,
                        ADD `quote_mile_location` SMALLINT NULL DEFAULT NULL AFTER `half_mile_location` ;");
    }

    public function down()
    {
        echo "m150422_175538_settings_for_quotes cannot be reverted.\n";
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
