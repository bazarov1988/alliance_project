<?php

use yii\db\Schema;
use yii\db\Migration;

class m151222_163943_additional_fields extends Migration
{
    public function up()
    {
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_500` INT (1) NULL;
		");
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_519` INT (1) NULL;
		");
	    $this->execute("
			ALTER TABLE `optional_property_coverages` ADD `sf_513_514_515` INT (1) NULL;
		");

	    $this->execute("
			ALTER TABLE `bop_rater_entry` ADD `special_events` INT (1) NULL;
		");

	    $this->execute("
			ALTER TABLE `bop_rater_entry` ADD `special_events_liability` INT (1) NULL;
		");

    }

    public function down()
    {
        echo "m151222_163943_additional_fields cannot be reverted.\n";

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
