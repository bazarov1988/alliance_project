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
        return $this->all_hazards ? round(\Yii::$app->params['exclusionary_endorsement']['all_hazards'], 0) : 0;
    }

    public function getADPBPremium()
    {
        return $this->a_d_p_b ? round(\Yii::$app->params['exclusionary_endorsement']['abestos'], 0) : 0;
    }

    public function getAthleticParticipantsPremium()
    {
        return $this->athletic_participants ? round(\Yii::$app->params['exclusionary_endorsement']['athletic_part'], 0) : 0;
    }

    public function getCertainSkinCareServicePremium()
    {
        return $this->certain_skin_care_service ? round(\Yii::$app->params['exclusionary_endorsement']['certain_skin_ls_76'], 0) : 0;
    }

    public function getCertainSkinCareServiceAPremium()
    {
        return $this->certain_skin_care_service_a ? round(\Yii::$app->params['exclusionary_endorsement']['certain_skin_ls_76a'], 0) : 0;
    }

    public function getDiscriminationClarificationPremium()
    {
        return $this->discrimination_clarification ? round(\Yii::$app->params['exclusionary_endorsement']['discrimination'], 0) : 0;
    }

    public function getEmploymentPracticesPremium()
    {
        return $this->employment_practices ? round(\Yii::$app->params['exclusionary_endorsement']['employment'], 0) : 0;
    }

    public function getFairsPremium()
    {
        return $this->fairs ? round(\Yii::$app->params['exclusionary_endorsement']['fairs'],0) : 0;
    }

    public function getKnownLossDamagePremium()
    {
        return $this->known_loss_damage ? round(\Yii::$app->params['exclusionary_endorsement']['known_loss_damage'], 0) : 0;
    }

    public function getDryCleaningDamagePremium()
    {
        return $this->dry_cleaning_damage ? round(\Yii::$app->params['exclusionary_endorsement']['laundry'], 0) : 0;
    }

    public function getLiquorLiabilityPremium()
    {
        return $this->liquor_liability ? round(\Yii::$app->params['exclusionary_endorsement']['mod_of_liquor'], 0) : 0;
    }

    public function getOperationsPremium()
    {
        return $this->operations ? round(\Yii::$app->params['exclusionary_endorsement']['operations'], 0) : 0;
    }

    public function getSaddleAnimalsPremium()
    {
        return $this->saddle_animals ? round(\Yii::$app->params['exclusionary_endorsement']['saddle_animals'], 0) : 0;
    }

    public function getIceControlOperationsPremium()
    {
        return $this->ice_control_operations ? round(\Yii::$app->params['exclusionary_endorsement']['snow_ice'], 0) : 0;
    }
} 