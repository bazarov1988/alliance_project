<?php

use yii\db\Schema;
use yii\db\Migration;

class m150427_160047_cause_of_loss_building_roof extends Migration
{
    public function up()
    {
        return $this->execute("ALTER TABLE  `optional_property_coverages` ADD  `cause_of_loss_building_roof` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `cause_of_loss_building`;");
    }

    public function down()
    {
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
