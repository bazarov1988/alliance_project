<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_155214_group_quotes extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `bop_rater_entry` ADD `multiple_locations_index` CHAR(255) NULL;
			ALTER TABLE `bop_rater_entry` ADD `file_path` VARCHAR( 255 ) NULL AFTER `multiple_locations_index`;
		");
    }

    public function down()
    {
        echo "m151224_155214_group_quotes cannot be reverted.\n";

        return false;
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
