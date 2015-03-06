<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 24.02.15
 * Time: 13:41
 */
namespace app\components;
use Yii;
use yii\base\Component;

class ExcelComponent extends Component{

    /**
     * @param $val
     * @param $source
     * @param $key
     * @param bool $needSortable
     * @return null
     * vlookup excel method
     */
    public function vlookup($key,$source,$val,$default=false){
        if(!empty($source[$key])&&is_array($source[$key])){
            if(!empty($source[$key][$val])){
                return $source[$key][$val];
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }

    /**
     * @param array $texts
     * @return null|string
     */
    public function concat($texts=[]){
        if(!empty($texts)){
            return implode('',$texts);
        }
        return null;
    }
} 