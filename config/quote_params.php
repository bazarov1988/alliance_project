<?php
return [
    'protection'=>[null=>'Select...',1=>'Highly Protected',2=>'Protected',3=>'Semi-Protected',4=>'Unprotected'],
    'zone'=>[null=>'Select...',1=>'Upstate & Sub.',2=>'Upstate Cities',3=>'New York City'],
    'prior_since'=>[null=>'Select...',1=>'Prior to 1/60',2=>'Since 1/60'],
    'occupied_type'=>[1=>'Owner  Occupied',2=>'Lessor  /Tenant Occupied'],
    'policy_type'=>[1=>'Standard Policy',2=>'Deluxe Policy'],
    'building_rc_acv'=>[null=>'Select...',1=>'Replacement Cost',2=>'Actual Cash Value',3=>'None'],['prompt'=>'Select...'],
    'business_property_rc_acv'=>[null=>'Select...',1=>'Replacement Cost',2=>'Actual Cash Value',3=>'None'],['prompt'=>'Select...'],
    'yes_no'=>[null=>'Select...',1=>'Yes',2=>'No'],
    'no_yes'=>[null=>'Select...',1=>'No',2=>'Yes'],
    'prop_damage'=>[null=>'Select...',1=>'$100,000',2=>'$300,000',3=>'$500,000',4=>'$1,000,000',5=>'$2,000,000',6=>'None'],
    'agregate'=>[null=>'Select...',1=>'$300,000',2=>'$500,000',3=>'$1,000,000',4=>'$2,000,000',5=>'$3,000,000',6=>'$4,000,000',7=>'None'],
    'deductible'=>[null=>'Select...',1=>'$100',2=>'$250',3=>'$500',4=>'$1,000',5=>'$2,5000',6=>'$5,000',7=>'$10,000',8=>'None'],
    'time_transmission_lines'=>[null=>'Select...',1=>'Excluding',2=>'Including'],
    'damages_transmission_lines'=>[null=>'Select...',1=>'Excluding',2=>'Including'],
    'cause_of_loss_business_property'=>[null=>'Select...',1=>'SF-1',2=>'SF-3',3=>'SF-4',4=>'SF-4A'],
    'cause_of_loss_building'=>[null=>'Select...',1=>'SF-1',2=>'SF-2',3=>'SF-3'],
    'building_inflation_protection'=>[null=>'Select...',1=>'1%',2=>'1.5%',3=>'2%',4=>'2.5%',5=>'3%'],

    'building_increment'=>[null=>'Select...',1,2,3,4,5],
    'bus_prop_increment'=>[null=>'Select...',1,2,3,4,5],
    'number_of_additional'=>[null=>'Select...',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
    'insured_premises_ten'=>[null=>'Select...',1,2,3,4,5,6,7,8,9,10],
    'insured_premises_a_ten'=>[null=>'Select...',1,2,3,4,5,6,7,8,9,10],

    'liquor_liability_restaurant'=>[null=>'Select...',1=>'Restaurants',3=>'Mercantile',7=>'Bed & Breakfast'],
    'liquor_liability_limit'=>[null=>'Select...',1=>'$100,000',2=>'$300,000',3=>'$500,000',4=>'$1,000,000',5=>'$2,000,000'],
    'fire_legal_settlement'=>[null=>'Select...',1=>'RC',2=>'ACV'],
    'barber_shop_liability'=>[
        null=>'Select...',
        1=>'$100,000 / $200,000',
        2=>'$300,000 / $600,000',
        3=>'$500,000 / $1,000,000',
        4=>'$1,000,000 / $2,000,000',
        5=>'$2,000,000 / $4,000,000'
    ],
    'liability_form'=>[null=>'Select...',1=>'LS-1',2=>'LS-5',3=>'LS-6',4=>'None'],
    'additional_insured'=>[null=>'Select...',1=>'LS-19',2=>'LS-21',3=>'LS-22',4=>'LS-23',5=>'None'],
    'add_increment'=>[0=>'Select...',1,2,3,4,5,6,7,8,9,10],
    'storekeepers_burglary_robbery'=>[0=>'Select...',1=>'$500',2=>'$1,000',3=>'$1,500',4=>'$2,000',5=>'$3,000',6=>'$4,000',7=>'$5,000',8=>'None'],
    'automobile_coverage'=>[null=>'Select...',1=>'$100,000',2=>'$300,000',3=>'$500,000',4=>'$1,000,000',5=>'$2,000,000'],
    'automobile_coverage_a'=>[null=>'Select...',1=>'$100,000',2=>'$300,000',3=>'$500,000',4=>'$1,000,000',5=>'$2,000,000'],


    'deductible_factors'=>[
        [1,"$100 ",1.05 ],
        [2,"$250 ",1 ],
        [3,"$500 ",0.93 ],
        [4,"$1,000 ",0.86 ],
        [5,"$2,500 ",0.79 ],
        [6,"$5,000 ",0.7 ],
        [7,"$10,000 ",0.6 ]
    ],
    'aggregate_factors'=>[
        [1,0.990,0.995,1.000,1.000,1.000,1.000,1.000 ],
        [2,1.000,0.988,0.990,1.000,1.000,1.000,1.000 ],
        [3,1.000,1.000,0.988,0.990,1.000,1.000,1.000 ],
        [4,1.000,1.000,1.000,0.988,0.990,1.000,1.000 ],
        [5,1.000,1.000,1.000,1.000,0.988,0.990,1.000 ],
        [6,1.000,1.000,1.000,1.000,1.000,1.000,1.000 ]
    ],
    'building_inflation'=>[
        ["1.0%",0.02 ],
        ["1.5%",0.03 ],
        ["2.0%",0.04 ],
        ["2.5%",0.053 ],
        ["3.0%",0.066 ],
        ["",0 ]
    ],
    'exclusionary_endorsement' => [
        'all_hazards'           => 0,
        'abestos'               => 0,
        'athletic_part'         => 0,
        'certain_skin_ls_76'    => 0,
        'certain_skin_ls_76a'   => 0,
        'discrimination'        => 0,
        'employment'            => 0,
        'fairs'                 => 0,
        'laundry'               => 0,
        'mod_of_liquor'         => 0,
        'operations'            => 0,
        'saddle_animals'        => 0,
        'snow_ice'              => 0,
        'known_loss_damage'     => 0
    ]

];
