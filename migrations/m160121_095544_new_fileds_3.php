<?php

use yii\db\Schema;
use yii\db\Migration;

class m160121_095544_new_fileds_3 extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_10b_value` INT (1) NULL;
		");
    }

    public function down()
    {
        echo "m160121_095544_new_fileds_3 cannot be reverted.\n";

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
