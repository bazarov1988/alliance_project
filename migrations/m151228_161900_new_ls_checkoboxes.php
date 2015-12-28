<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_161900_new_ls_checkoboxes extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_liability_coverages` ADD `ls_25_value` INT (1) NULL;
		");
	    $this->execute("
			ALTER TABLE `optional_liability_coverages` ADD `ls_44a_value` INT (1) NULL;
		");
    }

    public function down()
    {
        echo "m151228_161900_new_ls_checkoboxes cannot be reverted.\n";

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
