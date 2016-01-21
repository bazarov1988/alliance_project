<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_153345_new_fields_2 extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_32_value` INT (1) NULL;
			ALTER TABLE `optional_property_coverages` ADD `sf_102_value` INT (1) NULL;
			ALTER TABLE `optional_property_coverages` ADD `sf_103_value` INT (1) NULL;
			ALTER TABLE `optional_liability_coverages` ADD `ls_22a_value` INT (1) NULL;
		");
    }

    public function down()
    {
        echo "m160120_153345_new_fields_2 cannot be reverted.\n";

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
