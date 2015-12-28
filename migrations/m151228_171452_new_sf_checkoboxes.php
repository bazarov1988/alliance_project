<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_171452_new_sf_checkoboxes extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_349_value` INT (1) NULL;
		");
    }

    public function down()
    {
        echo "m151228_171452_new_sf_checkoboxes cannot be reverted.\n";

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
