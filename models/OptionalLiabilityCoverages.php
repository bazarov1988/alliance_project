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



    public function getQuote()
    {
        return $this->hasOne(Quotes::className(),['id'=>'quote_id'])->one();
    }

    public function getAllHazardsPremium()
    {
        return $this->all_hazards ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['all_hazards'], 0) : 0;
    }

    public function getADPBPremium()
    {
        return $this->a_d_p_b ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['abestos'], 0) : 0;
    }

    public function getAthleticParticipantsPremium()
    {
        return $this->athletic_participants ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['athletic_part'], 0) : 0;
    }

    public function getCertainSkinCareServicePremium()
    {
        return $this->certain_skin_care_service ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['certain_skin_ls_76'], 0) : 0;
    }

    public function getCertainSkinCareServiceAPremium()
    {
        return $this->certain_skin_care_service_a ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['certain_skin_ls_76a'], 0) : 0;
    }

    public function getDiscriminationClarificationPremium()
    {
        return $this->discrimination_clarification ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['discrimination'], 0) : 0;
    }

    public function getEmploymentPracticesPremium()
    {
        return $this->employment_practices ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['employment'], 0) : 0;
    }

    public function getFairsPremium()
    {
        return $this->fairs ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['fairs'],0) : 0;
    }

    public function getKnownLossDamagePremium()
    {
        return $this->known_loss_damage ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['known_loss_damage'], 0) : 0;
    }

    public function getDryCleaningDamagePremium()
    {
        return $this->dry_cleaning_damage ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['laundry'], 0) : 0;
    }

    public function getLiquorLiabilityPremium()
    {
        return $this->liquor_liability ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['mod_of_liquor'], 0) : 0;
    }

    public function getOperationsPremium()
    {
        return $this->operations ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['operations'], 0) : 0;
    }

    public function getSaddleAnimalsPremium()
    {
        return $this->saddle_animals ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['saddle_animals'], 0) : 0;
    }

    public function getIceControlOperationsPremium()
    {
        return $this->ice_control_operations ? round(\Yii::$app->params['quote']['exclusionary_endorsement']['snow_ice'], 0) : 0;
    }

    public function getExclusionCanineRelatedInjuriesDamagesPremium()
    {
        return -1;
    }

    public function getExtendedPollutionExclusionPremium()
    {
        return $this->extended_pollution_exclusion ? round(\Yii::$app->params['quote']['extended_pollution']['credit'] * -1, 0) : 0;
    }

    // fire_legal getters ----------------------------------------------------------------------------------------------

    public function getFireLegalAdditionalLimit()
    {
        return !empty($this->fire_legal) ? (int) $this->fire_legal : 0;
    }

    public function getFireLegalStdBldgCompRate()
    {
        // =IF(OR(GL2=0;GL2=" ";GL2="");0;$'Rate Tables'.R13)
        if(!empty($this->fire_legal) ) {
            return getBldgSTD(); // $'Rate Tables'.R13
        } else {
            return 0;
        }
    }

    protected function getBldgSTD()
    {
        throw new \BadMethodCallException("Not implemented yet.");
        // =IF(S13=FALSE();R14;0)
        // S13 =ISERROR($R$14)
        // R14 =IF($'List Sheet'.L2=1;VLOOKUP(R12;I11:O490;F3;FALSE());VLOOKUP(R12;I11:O490;F3-3;FALSE()))

        if($this->quote->policy_type == 1) {
            // VLOOKUP(R12;I11:O490;F3;FALSE())
            // R12 getFireLegalCombinationCode()
            // I11:O490 = ppc

            //return Yii::$app->excel->vlookup(Yii::$app->excel->concat([$quote->prior_since, $quote->zone, $quote->construction]),,false);
        } else {
            // VLOOKUP(R12;I11:O490;F3-3;FALSE())
            //return Yii::$app->excel->vlookup(,,false);
        }
    }

    protected function getFireLegalCombinationCode()
    {
        throw new \BadMethodCallException("Not implemented yet.");
        // =CONCATENATE($'List Sheet'.O2;$'List Sheet'.C2;A2;R11;A7;$'List Sheet'.G2;A6;A5)
        // A2 =IF($'List Sheet'.A2=3;2;$'List Sheet'.A2)
        // R11 =IF(OR($'List Sheet'.GL11="";$'List Sheet'.GL11="3");1;$'List Sheet'.GL11)
        // A7 =IF($'List Sheet'.G2>5;9;1)
        // $'List Sheet'.G2 =IF(OR(F2="";F2=0);0;OFFSET(F2;F2;1))
        // A6 =IF($'List Sheet'.G2>5;IF($'List Sheet'.G2=8;$'List Sheet'.K2;9);$'List Sheet'.K2)
        // A5 =IF($'List Sheet'.G2=1;$'List Sheet'.J2;9)
        $quote = $this->quote;
        return \Yii::$app->excel->concat([$quote->prior_since, $quote->zone, ]);
    }

    public function getFireLegalRate()
    {
        return \Yii::$app->params['quote']['fire_legal_rate'];
    }

    public function getFireLegalPremium()
    {
        return round($this->getFireLegalAdditionalLimit()/100*$this->getFireLegalStdBldgCompRate()*$this->getFireLegalRate(), 0);
    }

    //------------------------------------------------------------------------------------------------------------------

    public function getAutomobileCoverageAPremium()
    {
        return $this->getAutomobileCoverageAPrem() * $this->getAutomobileCoverageAAgg();
    }

    public function getAutomobileCoverageAPrem()
    {
        return !empty($this->automobile_coverage_a) ? \Yii::$app->params['quote']['automobile_coverage_a'][$this->automobile_coverage_a] : 0;
    }

    public function getAutomobileCoverageAAgg()
    {
        return !empty($this->automobile_coverage_a) ? \Yii::$app->excel->vlookup($this->automobile_coverage_a, \Yii::$app->params['quote']['aggregate_factors'], $this->quote->agregate+1,false) : 0;
    }
} 