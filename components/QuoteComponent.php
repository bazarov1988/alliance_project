<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 27.02.15
 * Time: 17:39
 */ 
namespace app\components;
use yii\base\Component;
use Yii;

class QuoteComponent extends Component{
    
    /**
     * @param $attr
     * @return null
     * @return val from params
     */
    public function getValueByAttribute($model,$attr,$key=null){
        if($key==null){
            $key = $attr;
        }
        if($model->$attr!==null){
            if(!empty(Yii::$app->params['quote'][$key])&&!empty(Yii::$app->params['quote'][$key][$model->$attr])){
                return Yii::$app->params['quote'][$key][$model->$attr];
            } else {
                return null;
            }
        }else{
            return null;
        }
    }
}