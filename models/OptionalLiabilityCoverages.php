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

    public function getLiabilityFormPremium()
    {
        $quote = $this->getQuote();
        $en2 = $quote['prop_damage'];
        if (!$en2) return 0;

        $liability_rates_array = \Yii::$app->params['quote']['optional_liability_rates'];
        $eu40 = 0;
        $eu37 = 325; //charge
        $l2 = $quote['policy_type'] == 1 ? 1 : 2;


        if ($quote['occupancy']['mer_serc'] < 3 && $quote['operated_by_insured'] == 1) {
            $ep2 = 1;

        } else if ($quote['occupancy']['rate_group'] < 5) {
            $ep2 = 2;
        } else {
            $ep2 = 3;
        }


        if ($en2 == 5) {//$2 000 000
            $eu40 = $eu37;
        }

        switch ($quote['country']) {
            case 9:
            case 30:
            case 52:
                $rate_country_offset = 3;
                break;
            default:
                $rate_country_offset = 0;

        }
        if ($this->liability_form == 0 || $this->liability_form == 4) {
            $eu2 = $l2;
        } else {
            $eu2 = $this->liability_form;
        }
        $rate_policy_offset = $eu2 + 1 + $rate_country_offset;

        return $eu40 + \Yii::$app->excel->vlookup(implode('', array($ep2, $l2, $en2)), $liability_rates_array, $rate_policy_offset, false);

    }

    public function getQuote()
    {
        return $this->hasOne(Quotes::className(),['id' => 'quote_id']);
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
        return $this->fairs ? round(\Yii::$app->params['exclusionary_endorsement']['fairs'],0) : 0;
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
            return $this->getBldgSTD(); // $'Rate Tables'.R13
        } else {
            return 0;
        }
    }

    protected function getBldgSTD()
    {
        if($this->quote->policy_type == 1) {
            return is_array(\Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()] ? \Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()][$this->quote->getRateTableKey()] : false);
        } else {
            return is_array(\Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()] ? \Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()][$this->quote->getRateTableKey()-3] : false);
        }
    }

    protected function getFireLegalCombinationCode()
    {
        $quote = $this->quote;

        $construction = $quote->construction == 3 ? 2 : $quote->construction;
        $fire_legal_settlement = (empty($this->fire_legal_settlement) || $this->fire_legal_settlement == 3) ? 1 : $this->fire_legal_settlement;
        $quote_occupancy_mer_serc1 = $quote->occupancy->mer_serc > 5 ? 9 : 1;
        $quote_occupancy_mer_serc2 = $quote->occupancy->mer_serc > 5 ? ($quote->occupancy->mer_serc == 8 ? $quote->occupied_type : 9) : $quote->occupied_type;
        $quote_occupancy_mer_serc3 = $quote->occupancy->mer_serc == 1 ? $quote->occupancy->bldg_rg : 9;

        return \Yii::$app->excel->concat([$quote->prior_since, $quote->zone, $construction, $fire_legal_settlement, $quote_occupancy_mer_serc1, $quote->occupancy->mer_serc, $quote_occupancy_mer_serc2, $quote_occupancy_mer_serc3]);
    }

    public function getFireLegalRate()
    {
        return \Yii::$app->params['quote']['fire_legal_rate'];
    }

    public function getFireLegalPremium()
    {
        return round($this->getFireLegalAdditionalLimit() / 100 * $this->getFireLegalStdBldgCompRate() * $this->getFireLegalRate(), 0);
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
        return !empty($this->automobile_coverage_a) ? \Yii::$app->excel->vlookup($this->automobile_coverage_a, \Yii::$app->params['quote']['aggregate_factors'], $this->quote->agregate,false) : 0;
    }
} 