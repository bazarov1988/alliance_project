<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_131938_multiple_locations extends Migration
{
    public function up()
    {
		$this->execute("
			CREATE TABLE IF NOT EXISTS `quotes_locations` (
			  `id` bigint(20) NOT NULL AUTO_INCREMENT,
			  `quote_id` int(11) NOT NULL,
			  `occupancy_id` int(11) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		");
		$models = \app\models\Quotes::find()->where('occupied is NULL')->all();
	    if(!empty($models)){
		    foreach($models as $model){
			    $location = new \app\models\QuotesLocations();
			    $location->quote_id = $model->id;
			    $location->occupancy_id = $model->occupied;
			    $location->save();
		    }
	    }
	    $this->execute("
	    ALTER TABLE `quotes_locations` ADD `clergypersons` INT( 11 ) NOT NULL DEFAULT '0' AFTER `occupancy_id` ,
		ADD `clergypersons_liability` INT( 1 ) NOT NULL DEFAULT '0' AFTER `clergypersons` ;
	    ");
	    $this->execute(
		    "ALTER TABLE `bop_rater_entry` ADD `asbestos_exclusion` INT( 11 ) NOT NULL DEFAULT '0' AFTER `settings`;"
	    );

    }

    public function down()
    {
        echo "m151130_131938_multiple_locations cannot be reverted.\n";
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
