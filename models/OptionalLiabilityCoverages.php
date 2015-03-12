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

    public function getBarberShopFullTimePrice()
    {
        $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
        if ($this->barber_shop_liability) {
            return $beauty_n_barber['beauty_parlor']['full_time'][$this->barber_shop_liability] * $this->emploees_full_time;
        }
        return null;
    }

    public function getBarberShopPartTimePrice()
    {
        $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
        if ($this->barber_shop_liability) {
            return $beauty_n_barber['beauty_parlor']['part_time'][$this->barber_shop_liability] * $this->emploees_part_time;
        }
        return null;
    }

    public function getBarberShopFirstBarberPrice()
    {
        if ($this->emploees_barbers_time > 0 && $this->barber_shop_liability) {
            $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
            return $beauty_n_barber['barber_shop']['first'][$this->barber_shop_liability] * 1;
        }
        return null;
    }

    public function getBarberShopAddlBarbersPrice()
    {
        if ($this->emploees_barbers_time > 0) {
            $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
            if (isset($beauty_n_barber['barber_shop']['each_add_l'][$this->barber_shop_liability]) || $this->emploees_barbers_time) {

                return $beauty_n_barber['barber_shop']['each_add_l'][$this->barber_shop_liability] * ($this->emploees_barbers_time - 1);
            }
        }
        return null;

    }

    public function getBarberShopManicuristsPrice()
    {
        if ($this->barber_shop_liability) {
            $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
            return $beauty_n_barber['manicurists'][$this->barber_shop_liability] * $this->emploees_manicurists;
        }
        return null;

    }

    public function getBarberShopLimit()
    {
        if ($this->barber_shop_liability) {
            $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
            return $beauty_n_barber['limit'][$this->barber_shop_liability];
        }
        return null;
    }

    public function getBeautyNBarberTotalEmployees()
    {
        return $this->emploees_full_time +
            $this->emploees_part_time +
            1 + //first
            $this->emploees_barbers_time - 1 + //additional
            $this->emploees_manicurists;
    }
    public function getBeautyNBarberPremium()
    {
        $beauty_n_barber = \Yii::$app->params['quote']['beauty_n_barber'];
        $summ = $this->getBarberShopFullTimePrice() +
            $this->getBarberShopPartTimePrice() +
            $this->getBarberShopFirstBarberPrice() +
            $this->getBarberShopAddlBarbersPrice() +
            $this->getBarberShopManicuristsPrice();
        if ($this->barber_shop_liability) {
            if ($summ > $beauty_n_barber['minimum_premium'])
                return $summ;
            else
                return $beauty_n_barber['minimum_premium'];
        }
        return null;
    }

    /**
     * @return CC2_CF11 CC2:CF11
     */
    public function getPolicySummaryBeforeAdditionalInsured(){
        $building = [
            'initial_premium'=>$this->getCompositePremiumBuldingRate(),
            'factor'=>1,
        ];
        $bp = [
            'initial_premium'=>$this->getCompositePremiumBusinessPropRate(),
            'factor'=>1
        ];
        $opt_prop = [
            'initial_premium'=>$this->getTotalPropertyCoverages(),
            'factor'=>1
        ];
        $opt_liab = [
            'initial_premium'=>$this->getTotalLiabilityCoverages(),
            'factor'=>1
        ];
        $summ = ($building['initial_premium']*$building['factor'])+
            ($bp['initial_premium']*$bp['factor'])+
            ($opt_prop['initial_premium']*$opt_prop['factor'])+
            ($opt_liab['initial_premium']*$opt_liab['factor']);


        return [
            'building'=>$building,
            'business_property'=>$bp,
            'optional_property'=>$opt_prop,
            'optional_liability'=>$opt_liab,
            'total_premium'=>['initial_premium'=>$summ]
        ];
    }

    /**
     * @return CI1_CL11 CI1:CL11
     */
    public function getTotalPropertyCoverages(){

        $summ = 0;
        /* @var $propCovrgs \app\models\OptionalPropertyCoverages */
        $propCovrgs = $this->quote->propertyCoverages;

        $summ += $propCovrgs->getAccountsReceivablePremium();
        $summ += $propCovrgs->getAdditionalExpensePremium();
//        $summ += $propCovrgs->getAlcoholicBeveragesTaxExclusion();
//        $summ += $'Rate Tables'.BE12 //todo (unnamed field)
        $summ += $propCovrgs->getBuildingInflationProtectionPremium();
//        $summ += $propCovrgs->getBusinessownersAgreedAmount();
//        $summ += $'Rate Tables'.BH51 //todo (unnamed field)

        $summ += $propCovrgs->getBusinessownersBurglaryRobberyPremium();
        $summ += $propCovrgs->getCauseOfLossBuildingPremium();
        $summ += $propCovrgs->getCauseOfLossBPPremium();
        $summ += $propCovrgs->getComputerCoveragePremium();

//        $summ += $'Rate Tables'.BF37 //todo (unnamed field)

        $summ += $propCovrgs->getCookingProtectionInitialPremium();
        $summ += $propCovrgs->getCustomersGoodsPremium();
        $summ += $propCovrgs->getDemolitionDebrisPremium();
        $summ += $propCovrgs->getEarthquakeCoveragePremium();//summ

        $summ += $propCovrgs->getEmployeePremium();//Employee Dishonesty
        $summ += $propCovrgs->getEquipmentBreakdownPremium();
        $summ += $propCovrgs->getExteriorSignsPremium();

//        $summ += $'Rate Tables'.BE67; //todo (unnamed field)
//        $summ += $'Rate Tables'.BG69; //todo (unnamed field)

        $summ += $propCovrgs->getLoss_off_IncomeMonthPremium(); //$'Rate Tables'.BF74
        $summ += $propCovrgs->getLoss_off_IncomePremium(); //$'Rate Tables'.BF78
        $summ += $propCovrgs->getLoss_off_IncomeATotal(); //$'Rate Tables'.BL84
        $summ += $propCovrgs->getLossPayablePremium(); //$'Rate Tables'.BD86
        $summ +=  $propCovrgs->getMoneySecuritiesPremium();//$'Rate Tables'.BF88 //Money & Securities
        $summ +=  $propCovrgs->getDirectDamagesPremium();//$'Rate Tables'.BG91 //Off Premises Power - Direct Damages
        $summ +=  $propCovrgs->getTimeElementPremium();//$'Rate Tables'.BG93 //Off Premises Power - Time Element

//        $summ += $'Rate Tables'.BF97 //todo (unnamed field)
//        $summ += $'Rate Tables'.BE101 //todo (unnamed field)
//        $summ += $'Rate Tables'.BF99 //todo (unnamed field)
//        $summ += $'Rate Tables'.BE103 //todo (unnamed field)

        $summ += $propCovrgs->getOrdinanceAndLawPremium();
        $summ += $propCovrgs->getBuildingGlassPremium();//OutsideGradeFloorBuildingGlass();
        $summ += $propCovrgs->getRefrigeratedFoodPremium();
        $summ += $propCovrgs->getRefrigeratedPropertyPremium();
        $summ += $propCovrgs->getSeasonVariationPremium();
        $summ += $propCovrgs->getSprinklerLeakagePremium();
        $summ += $propCovrgs->getTenantImprovementsPremium();
        $summ += $propCovrgs->getTenantImprovementsAPremium();
        $summ += $propCovrgs->getValuablePapersPremium();
        $summ += $propCovrgs->getInsuredPremisesPremium();
        $summ += $propCovrgs->getInsuredPremisesAPremium();
        return $summ;

    }

    /**
     * IF(BU20;ROUND($'List Sheet'.FD2*-1;0);0)
     * @return float|int
     */
    public function getBatteryExclusionPremium()
    {
        if($this->battery_exclusion){
            return round(\Yii::$app->params['quote']['assault_and_batt'] * -1,0);
        }
        return null;
    }

    /**
     * @return float|int
     */
    function getTotalLiabilityCoverages(){

        $summ = 0;
        $summ+=$this->getCreditPremium();
        $summ+=$this->getAdditionalInsuredContractors();
        $summ+=$this->getAdditionalInsuredOwners();
        //
//        $summ+=$'Rate Tables'.BZ18 todo (empty title)
        $summ+=$this->getBatteryExclusionPremium();
        $summ+=$this->getBeautyNBarberPremium();
        $summ+=$this->getDesignatedPremisesPremium();
//        $summ+=$'Rate Tables'.BX40 // todo (empty title)
        $summ+=$this->getContractualLiabilityLimitationPremium();
        $summ+=$this->getProjectOnlyCompPremium();//Cov. Applicable to Desig. Prem. or Project Only

        $summ+=$this->getAutomobileCoveragePremium();//Employers' Non-ownership Automobile Coverage
        $summ+=$this->getAcquiredEntitiesPremium();//Exclusion of Newly Acquired Entities
        $summ+=$this->getExclusionCanineRelatedInjuriesDamagesPremium();//Exclusion of Canine Related Injuries or Damages
        $summ+=$this->getExtendedPollutionExclusionPremium();//Extended Pollution Exclusion
        $summ+=$this->getFireLegalPremium();//Fire Legal
        $summ+=$this->getAutomobileCoverageAPremium();//Hired and Non-owned Automobile Coverage
        $summ+=$this->getLiquorLiabilityReceiptsPremium();//Liquor Liability
        $summ+=$this->getPersonalInjuryPremium();
        $summ+=$this->getPoolLiabilityPremium();
        $summ+=$this->getCompletedOperationsPremium();//Products/Completed Operations
        $summ+=$this->getWaterDamageExclusionPremium();//Water Damage Exclusion - New York  City
        return $summ;
    }

    /**
     * @return array
     */
    public function getPolicySummaryAfterAdditionalInsured()
    {
        $PSbefore = $this->getPolicySummaryBeforeAdditionalInsured();
        $sumPremium =
            $PSbefore['building']['initial_premium'] +
            $PSbefore['business_property']['initial_premium'] +
            $PSbefore['optional_property']['initial_premium'] +
            $PSbefore['optional_liability']['initial_premium'];
        return [
            'building' => ['initial_premium' => $PSbefore['building']['initial_premium']],
            'business_property' => ['initial_premium' => $PSbefore['business_property']['initial_premium']],
            'optional_property' => ['initial_premium' => $PSbefore['optional_property']['initial_premium']],
            'optional_liability' => ['initial_premium' => $PSbefore['optional_liability']['initial_premium']],
            'premium' => ['initial_premium' => $sumPremium]
        ];
    }

    /**
     * get Total results
     */
    public function getTotalResults(){
        $PSbefore = $this->getPolicySummaryBeforeAdditionalInsured();
        $irpmIndex = 1;
        $finalPremium = 0;
        $irpm = 0;
        $fireFree = 0;
        if ($this->quote->irpm_type == 1) $irpmIndex = -1;
        $sumPremium =
            $PSbefore['building']['initial_premium'] +
            $PSbefore['business_property']['initial_premium'] +
            $PSbefore['optional_property']['initial_premium'] +
            $PSbefore['optional_liability']['initial_premium'];
        $finalPremium = $sumPremium + $this->getAdditionalInsuredPremium();
        $irpm = ($finalPremium>\Yii::$app->params['quote']['max_sum_for_irpm'])?round($finalPremium * (($this->quote->irpm_percent / 100) * $irpmIndex), 0):0;
        $fireFree = ($PSbefore['building']['initial_premium'] + $PSbefore['business_property']['initial_premium']) * (1 + (($this->quote->irpm_percent / 100) * $irpmIndex)) * 0.5 * 0.0125;
        return [
            'premium' => $finalPremium,
            'irpm' => $irpm,
            'total_premium' => $finalPremium - $irpm,
            'fire_free' => $fireFree
        ];
    }

    /**
     * Add'l Insured - Contractual - Owners & Lessees
     * $'List Sheet'.HZ9
     */
    public function getAdditionalInsuredsMinimumTotal()
    {
        return \Yii::$app->params['quote']['additional_insureds']['minimum'] * $this->additional_insured_number;
    }

    public function getAdditionalInsuredsRateTotal()
    {
        $rate = \Yii::$app->params['quote']['additional_insureds']['rate'] *
            $this->additional_insured_number *
            $this->getPolicySummaryAfterAdditionalInsured()['premium']['initial_premium'];
        return $rate;
    }

    /**
     * @return AF11 = IF(AF20<AF16;AF16;AF20)
     */
    public function getApplicablePremium()
    {

        if ($this->getProjectOnlyCompPremium() < $this->getApplicableMaximum()) {//IF(AF20<AF16;AF16;AF20)
//            return 'AF16';
            return $this->getApplicableMaximum();
        } else {
//            return 'AF20'
            return $this->getProjectOnlyCompPremium();
        }
    }

    /**
     * @return  AF16 = IF($'List Sheet'.L2=1;AF14;AF15)
     *$'List Sheet'.L2 = Standard/Deluxe
     */
    public function getApplicableMaximum()
    {
        if ($this->quote->policy_type == 1) {
//            return 'AF14';
            return \Yii::$app->params['quote']['standard_minimum'];
        } else {
//            return 'AF15';
            return \Yii::$app->params['quote']['deluxe_minimum'];
        }
    }

    /**
     * @return AF8 =IF(AF24>0;IF(AF11<>AF20;AF11;AF24);0)
     */
    public function getCompositePremiumBuldingRate(){
//        if('AF24'>0)
        if($this->quote->getBldgComposite()>0){
//            if('AF11'!='AF20'){
            if($this->getApplicablePremium()!=$this->getProjectOnlyCompPremium()){
//                return 'AF11';
                return $this->getApplicablePremium();

            }else{
//                return 'AF24';
                return $this->quote->getBldgComposite();
            }
        }
        return null;
    }
    /**
     * @return AF9  = IF(AF25>0;IF(AF11<>AF20;IF(AF24>0;0;AF11);AF25);0)
     */
    public function getCompositePremiumBusinessPropRate(){
//        if('AF25'>0)
        if($this->quote->getBPComposite()>0){
//            if('AF11'!='AF20')
            if($this->getApplicablePremium()!=$this->getProjectOnlyCompPremium()){
//                if('AF24'>0){
                if($this->quote->getBldgComposite()>0){
                    return 0;
                }else{
                    return $this->getApplicablePremium();
                }
            }
        }
        return null;
    }

    /**
     * @return BY15
     */
    public function getAdditionalInsuredPremium(){
        $min = $this->getAdditionalInsuredsMinimumTotal();
        $rate =$this->getAdditionalInsuredsRateTotal();
        return $min>$rate?$min:$rate;
    }
    public function getAdditionalInsuredOwners(){
        if($this->add_insured_owners_lessees) //IF(HZ3;HZ6;0)
        {
            return 89;
        }else{
            return 0;
        }
    }
    /**
     * Add'l Insured - Contractual - Contractors
     */
    public function getAdditionalInsuredContractors(){
        if($this->add_insured_owners_contactors) //IF(HZ3;HZ6;0)
        {
            return 99;
        }else{
            return 0;
        }
    }
    public function getLiabilityFormPremium()
    {
        $quote = $this->quote;
        $en2 = $quote->prop_damage;
        if (!$en2) return 0;

        $liability_rates_array = \Yii::$app->params['quote']['optional_liability_rates'];
        $eu40 = 0;
        $eu37 = 325; //charge
        $l2 = $quote->policy_type == 1 ? 1 : 2;


        if ($quote->occupancy->mer_serc < 3 && $quote->operated_by_insured == 1) {
            $ep2 = 1;

        } else if ($quote->occupancy->rate_group < 5) {
            $ep2 = 2;
        } else {
            $ep2 = 3;
        }


        if ($en2 == 5) {//$2 000 000
            $eu40 = $eu37;
        }

        switch ($quote->country) {
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
        $rate_policy_offset = $eu2 + $rate_country_offset; //+1
        if (isset($liability_rates_array[\Yii::$app->excel->concat([$ep2, $l2, $en2])]))
            return $eu40 + $liability_rates_array[\Yii::$app->excel->concat([$ep2, $l2, $en2])][$rate_policy_offset];
        else
            return null;


    }
    /**
     * EW4 = IF(EN2=6;IF(AND(G2=1;H2=5);EW3;EW2);0)
     */
    public function getCreditRate(){
        $removeLiab = \Yii::$app->params['quote']['remove_liab'];
        return ($this->quote->occupancy->mer_serc==1 && $this->quote->occupancy->rate_group == 5)? $removeLiab['grp_5']: $removeLiab['all'];
    }

    public function getCreditPremium()
    {
        $credit = 0;
        if ($this->quote->prop_damage == 6) {
            $credit = $this->getCreditRate() * $this->getProjectOnlyCompPremium();
        }
        return $credit;
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
            return $this->getBldgSTD(); // $'Rate Tables'.R13
        } else {
            return 0;
        }
    }

    protected function getRateTableValue($key, $offset)
    {

        $rateTable = \Yii::$app->params['quote']['rate_table'];//I11:O490
        if (is_array($rateTable[$key]))
            $val = isset($rateTable[$key][$offset]) ? $rateTable[$key][$this->quote->getRateTableKey()] : null;
        else
            $val = null;

        return $val;
    }
    protected function getBldgSTD()
    {
        if($this->quote->policy_type == 1) {
            return is_array(\Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()] ? \Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()][$this->quote->getRateTableKey()] : false);
        } else {
            return is_array(\Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()] ? \Yii::$app->params['quote']['rate_table'][$this->getFireLegalCombinationCode()][$this->quote->getRateTableKey()-3] : false);
        }
    }
    protected function getCreditCombinationCode(){
        $quote = $this->quote;
        $construction = $quote->construction == 3 ? 2 : $quote->construction;
        $quote_occupancy_mer_serc1 = $quote->occupancy->mer_serc > 5 ? 9 : 1;
        $quote_occupancy_mer_serc2 = $quote->occupancy->mer_serc > 5 ? ($quote->occupancy->mer_serc == 8 ? $quote->occupied_type : 9) : $quote->occupied_type;
        $quote_occupancy_mer_serc3 = $quote->occupancy->mer_serc == 1 ? $quote->occupancy->bldg_rg : 9;//J2 = $quote->occupancy->bldg_rg

        return \Yii::$app->excel->concat([
            $quote->prior_since,
            $quote->zone,
            $construction,
            $quote->building_rc_acv,
            $quote_occupancy_mer_serc1,
            $quote->occupancy->mer_serc,//G2
            $quote_occupancy_mer_serc2,
            $quote_occupancy_mer_serc3
        ]);


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
        return !empty($this->automobile_coverage_a) ? \Yii::$app->excel->vlookup($this->automobile_coverage_a, \Yii::$app->params['quote']['aggregate_factors'], $this->quote->agregate-1,false) : 0;
    }

    public function getAutomobileCoverageALimit()
    {
        return $this->automobile_coverage_a ? \Yii::$app->params['quote']['prop_damage'][$this->automobile_coverage_a] : null;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getRating14AptsPremium()
    {
        return $this->getRating14AptsRate() + $this->getAdditionalApartmentsRate();
    }

    public function getRating14AptsRate()
    {
        // LS =IF(GO9<>0;IF(GO9<5;VLOOKUP(GO9;GO12:GR16;GO2+1;FALSE());VLOOKUP(4;GO12:GR16;GO2+1;FALSE()));0)

        throw new \BadMethodCallException('Not implemented yet. Empty field in Entry Sheet!');

        return 0;
    }

    public function getAdditionalApartmentsRate()
    {
        // LS =GQ21*GR21

        throw new \BadMethodCallException('Not implemented yet. Empty field in Entry Sheet!');

        return 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getLiquorLiabilityReceiptsPremium()
    {
        $prePremium = $this->getLiquorLiabilityReceiptsPrePremium();
        $minimum = $this->getLiquorLiabilityReceiptsPreMinimum();
        return  $prePremium > $minimum ? $prePremium : $minimum;
    }

    public function getLiquorLiabilityReceiptsPrePremium()
    {
        if($this->liquor_liability_restaurant == 3) {
            return $this->getLiquorLiabilityReceiptsRate();
        } else {
            return round(($this->liquor_liability_receipts / 100 * $this->getLiquorLiabilityReceiptsRate()), 0);
        }
    }

    public function getLiquorLiabilityReceiptsPreMinimum()
    {
        // =IF(GW15=1;OFFSET(GS2;GS2;5);IF(GW15=2;OFFSET(GS2;GS2;6);0))
        if($this->liquor_liability_restaurant == 1) {
            return is_array(\Yii::$app->params['quote']['receipt_amount'][$this->liquor_liability_limit]) ? \Yii::$app->params['quote']['receipt_amount'][$this->liquor_liability_limit][4] : 0;
        } else if($this->liquor_liability_restaurant == 2) {
            return is_array(\Yii::$app->params['quote']['receipt_amount'][$this->liquor_liability_limit]) ? \Yii::$app->params['quote']['receipt_amount'][$this->liquor_liability_limit][5] : 0;
        }
        return null;
    }

    public function getLiquorLiabilityReceiptsRate()
    {
        // $'List Sheet'.GU23 =IF(GW15=3;OFFSET(GS2;GS2;7);OFFSET(GS2;GS2;GU25))
        if($this->liquor_liability_restaurant == 3) {
            return is_array(\Yii::$app->params['quote']['receipt_amount'][(int)$this->liquor_liability_limit]) ? \Yii::$app->params['quote']['receipt_amount'][(int)$this->liquor_liability_limit][6] : 0;
        } else {
            return is_array(\Yii::$app->params['quote']['receipt_amount'][(int)$this->liquor_liability_limit]) ? \Yii::$app->params['quote']['receipt_amount'][(int)$this->liquor_liability_limit][(int)$this->liquor_liability_receipts] : 0;
        }
    }

    public function getLiquorLiabilityReceiptsLimit()
    {
        return $this->liquor_liability_limit ? \Yii::$app->params['quote']['liquor_liability_limit'][$this->liquor_liability_limit] : null;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getMedicalPaymentsLimit()
    {
        $quote = $this->quote;
        return !empty($quote->med_payment) ? $quote->medPayment->name : 'None';
    }

    public function getMedicalPaymentsPremium()
    {
        $quote = $this->quote;
        if(!empty($quote->med_payment)) {
            if($quote->policy_type == 1) {
                return $quote->medPayment->standart;
            } else {
                return $quote->medPayment->premium;
            }
        } else {
            return 0;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getPersonalInjuryApplies()
    {
        return $this->personal_injury;
    }

    public function getPersonalInjuryPremium()
    {
        return $this->quote->policy_type == 1 ? ($this->personal_injury ? 15 : 0) : 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getPoolLiabilityPremium()
    {
        return $this->pool_liability ? \Yii::$app->params['quote']['pool_liability'][$this->quote->prop_damage]: 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getCompletedOperationsPremium()
    {
        // =($'List Sheet'.HJ6*-1)
        return $this->getCompletedOperationsApplicable() * -1;
    }

    protected function getCompletedOperationsApplicable()
    {
        // =IF(HI2;IF(H2=5;HJ3;HJ4);0)
        return $this->completed_operations ? ($this->getOccupancyRateGroup() == 5 ? \Yii::$app->params['quote']['completed_operations_rates']['rate_gr_5'] : \Yii::$app->params['quote']['completed_operations_rates']['others'] ) : 0;
    }

    protected function getOccupancyRateGroup()
    {
        // =IF(OR(F2="";F2=0);"";OFFSET(F2;F2;2))
        $quote = $this->quote;
        return ($quote->occupancy) ? $quote->occupancy->rate_group : null;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getWaterDamageExclusionPremium()
    {
        return $this->getApartmentsPremium() + $this->getOfficesInApartmentPremium() + $this->getOfficesInOtherPremium() + $this->getStoreInApartmentPremium() + $this->getStoreInOtherPremium();
    }

    public function getApartmentsPremium()
    {
        // 1=ROUND(BU155*BV155;0)
        // round(applies * rate)
        return round($this->getApartmentsApplies() * $this->getApartmentsRate(), 0);
    }
    public function getApartmentsApplies()
    {
        $rate = $this->getApartmentsRate();
        return $rate != 0 ? $rate : 0;
    }
    public function getApartmentsRate()
    {
        if($this->water_damage_exclusion) {
            return !empty($this->water_damage_exclusion_apartments) ? \Yii::$app->params['quote']['water_damage_rates']['apt'] : 0;
        } else {
            return 0;
        }
    }


    public function getOfficesInApartmentPremium()
    {
        return round($this->getOfficesInApartmentApplies() * $this->getOfficesInApartmentRate(), 0);
    }
    public function getOfficesInApartmentApplies()
    {
        $rate = $this->getOfficesInApartmentRate();
        return $rate != 0 ? $rate : 0;
    }
    public function getOfficesInApartmentRate()
    {
        if($this->water_damage_exclusion) {
            return !empty($this->water_damage_exclusion_offices_in_ah) ? \Yii::$app->params['quote']['water_damage_rates']['office_in_apt'] : 0;
        } else {
            return 0;
        }
    }

    public function getOfficesInOtherPremium()
    {
        return round($this->getOfficesInOtherApplies() * $this->getOfficesInOtherRate(), 0);
    }
    public function getOfficesInOtherApplies()
    {
        $rate = $this->getOfficesInOtherRate();
        return $rate != 0 ? $rate : 0;
    }
    public function getOfficesInOtherRate()
    {
        if($this->water_damage_exclusion) {
            return !empty($this->water_damage_exclusion_offices_in_ob) ? \Yii::$app->params['quote']['water_damage_rates']['office_in_other'] : 0;
        } else {
            return 0;
        }
    }

    public function getStoreInApartmentPremium()
    {
        return round($this->getStoreInApartmentApplies() * $this->getStoreInApartmentRate(), 0);
    }
    public function getStoreInApartmentApplies()
    {
        $rate = $this->getStoreInApartmentRate();
        return $rate != 0 ? $rate : 0;
    }
    public function getStoreInApartmentRate()
    {
        if($this->water_damage_exclusion) {
            return !empty($this->water_damage_exclusion_store_in_ah) ? \Yii::$app->params['quote']['water_damage_rates']['store_in_apt'] : 0;
        } else {
            return 0;
        }
    }

    public function getStoreInOtherPremium()
    {
        return round($this->getStoreInOtherApplies() * $this->getStoreInOtherRate(), 0);
    }
    public function getStoreInOtherApplies()
    {
        $rate = $this->getStoreInOtherRate();
        return $rate != 0 ? $rate : 0;
    }
    public function getStoreInOtherRate()
    {
        if($this->water_damage_exclusion) {
            return !empty($this->water_damage_exclusion_store_in_ob) ? \Yii::$app->params['quote']['water_damage_rates']['store_in_other'] : 0;
        } else {
            return 0;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getAcquiredEntitiesPremium()
    {
        return $this->acquired_entities ? round(\Yii::$app->params['quote']['acquired_entities_credit'] * -1, 0) : 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getAutomobileCoveragePremium()
    {
        return round($this->getAutomobileCoveragePrem() * $this->getAutomobileCoverageAgg(), 0);
    }

    public function getAutomobileCoverageLimit()
    {
        return $this->automobile_coverage ? \Yii::$app->params['quote']['automobile_coverage'][$this->automobile_coverage] : null;
    }

    public function getAutomobileCoveragePrem()
    {
        return !empty($this->automobile_coverage) ? \Yii::$app->params['quote']['automobile_coverage_premium'][$this->automobile_coverage] : 0;
    }

    public function getAutomobileCoverageAgg()
    {
        // =IF(AND(GE2<>"";GE2<>0);VLOOKUP(GE2;BA3:BH8;GE15+1;FALSE());0)
        return !empty($this->automobile_coverage) ? \Yii::$app->params['quote']['aggregate_factors'][$this->automobile_coverage][$this->automobile_coverage_agregate - 1] : 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getProjectOnlyPremium()
    {
        return $this->project_only ? round($this->getProjectOnlyCredit() * $this->getProjectOnlyCompPremium() * -1) : 0;
    }

    public function getProjectOnlyCredit()
    {
        // =IF(FU7;IF(F2=97;VLOOKUP($'Entry Sheet'.AF4;FU3:FW5;2;FALSE());VLOOKUP($'Entry Sheet'.AF4;FU3:FW5;3;FALSE()));0)
        return $this->project_only ? $this->getDesignatedPremiseCredits() : 0;
    }

    protected function getDesignatedPremiseCredits() {
        if($this->quote->occupied == 97) {
            // VLOOKUP($'Entry Sheet'.AF4;FU3:FW5;2;FALSE())
            return (isset(\Yii::$app->params['quote']['designated_premise_credits'][$this->exclusionary_endorsements - 1])) ? \Yii::$app->params['quote']['designated_premise_credits'][$this->exclusionary_endorsements - 1][0] : 0;
        } else {
            // VLOOKUP($'Entry Sheet'.AF4;FU3:FW5;3;FALSE())
            return (isset(\Yii::$app->params['quote']['designated_premise_credits'][$this->exclusionary_endorsements - 1])) ? \Yii::$app->params['quote']['designated_premise_credits'][$this->exclusionary_endorsements - 1][1] : 0;
        }
    }

    public function getProjectOnlyCompPremium()
    {
        // =AF20 =SUM(IF(ISERROR(AF24);0;AF24);IF(ISERROR(AF25);0;AF25))
        return $this->quote->getBldgComposite() + $this->quote->getBPComposite();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getContractualLiabilityLimitationPremium()
    {
        return $this->contractual_liability_limitation ? round(\Yii::$app->params['quote']['contractual_liability_limitation_credit'] * -1, 0) : 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getDesignatedPremisesPremium()
    {
        return $this->designated_premises ? round(\Yii::$app->params['quote']['designated_premises_credit'] * -1, 0) : 0;
    }
}
