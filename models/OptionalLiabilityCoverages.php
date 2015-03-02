<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 27.02.15
 * Time: 19:01
 */

namespace app\models;
use app\models\_base\BaseOptionalLiabilityCoverages;


class OptionalLiabilityCoverages extends BaseOptionalLiabilityCoverages
{

    public function getAllHazardsPremium()
    {
        return $this->all_hazards ? round(\Yii::$app->params['exclusionary_endorsement']['all_hazards'],0) : 0;
    }

    public function getDiscriminationClarificationPremium()
    {
        return $this->discrimination_clarification ? round(\Yii::$app->params['exclusionary_endorsement']['discrimination'],0) : 0;
    }
} 