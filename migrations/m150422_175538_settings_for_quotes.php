<?php

use yii\db\Schema;
use yii\db\Migration;

class m150422_175538_settings_for_quotes extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `bop_rater_entry` ADD `settings` TEXT NULL AFTER `irpm_percent` ;");
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
