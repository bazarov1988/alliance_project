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
    public function vlookup($val,$source,$key,$notNeedEqual=false){
        $key-=1;
        $result = null;
        $lVal = $source[0][0];
        if($notNeedEqual){
            foreach($source as $skey=>$sval){
                if($sval[0]<=$val&&$sval[0]>$lVal){
                    $lVal = $sval[0];
                    $result = $skey;
                    if($sval[0]==$val)
                    break;
                }
            }
        } else {
            foreach($source as $skey=>$sval){
                if($sval[0]==$val){
                    $result = $skey;
                    break;
                }
            }
        }
        return (isset($source[$result][$key]))?$source[$val][$key]:0;
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