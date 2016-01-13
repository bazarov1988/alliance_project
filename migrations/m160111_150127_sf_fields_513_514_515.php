<?php

use yii\db\Schema;
use yii\db\Migration;

class m160111_150127_sf_fields_513_514_515 extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_513_value` INT (1) NULL;
			ALTER TABLE `optional_property_coverages` ADD `sf_514_value` INT (1) NULL;
			ALTER TABLE `optional_property_coverages` ADD `sf_515_value` INT (1) NULL;
			ALTER TABLE `optional_property_coverages` ADD `sf_520_value` INT (1) NULL;
			ALTER TABLE `optional_liability_coverages` ADD `ls_22a_value` INT (1) NULL;
		");
    }

    public function down()
    {
        echo "m160111_150127_sf_fields_513_514_515 cannot be reverted.\n";

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
