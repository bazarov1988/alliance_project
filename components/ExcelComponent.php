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
    public function vlookup($val,$source,$key,$needEqual=false){
        $result = null;
        $source = ksort($source);
        foreach($source as $skey=>$sval){
            if($needEqual){
                if($skey<=$val){
                    $result = $sval[$key];
                    if($skey==$val)
                        return $result;
                }
            } else {
                if($skey==$val){
                    return $sval[$key];
                }
            }
        }
        return $result;
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