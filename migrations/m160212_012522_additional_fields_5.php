<?php

use yii\db\Schema;
use yii\db\Migration;

class m160212_012522_additional_fields_5 extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `optional_liability_coverages` ADD `ls_59_value` INT (1) NULL;");
    }

    public function down()
    {
        echo "m160212_012522_additional_fields_5 cannot be reverted.\n";

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
