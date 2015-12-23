<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_152515_amount_of_receipts extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_liability_coverages` ADD `amount_of_receipts` INT (1) NULL;
		");
    }

    public function down()
    {
        echo "m151223_152515_amount_of_receipts cannot be reverted.\n";

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
