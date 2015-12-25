<?php

use yii\db\Schema;
use yii\db\Migration;

class m151218_170453_ls_dce extends Migration
{
    public function up()
    {
	    $this->execute("ALTER TABLE `optional_liability_coverages` ADD `ls_dce` CHAR(255) NULL;");
    }

    public function down()
    {
        echo "m151218_170453_ls_dce cannot be reverted.\n";

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
