<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Occupancy;

class m150305_150027_bldg_rg_field_for_occupancy extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `occupancy` ADD `bldg_rg` INT NULL AFTER `crime_group`");
        $arr = [9,9,9,9,1,1,1,1,2,1,2,1,2,1,1,1,1,1, 1,1,1,2,1,1,1,2,1,2,2,1,2,1,1,1,1,1,1,2,1,1,1,2,1,1,1,1,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,2,1,1,1,1,1,1,1,1,1,2,1,2,1,1,1,1,2,2,2,1,1,1,2,1,1,1,2,1,1,1,2,1,2,2,1,1,1,2,1,1,1,2,1,1,1,1];
        foreach($arr as $key=>$a){
            $model = Occupancy::findOne($key+1);
            $model->bldg_rg = $a;
            $model->save();
        }

    }

    public function down()
    {
        echo "m150305_150027_bldg_rg_field_for_occupancy cannot be reverted.\n";

        return false;
    }
}
