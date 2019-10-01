<?php
    return [
        'api' => [

            1 =>[

                'DHL_USER'        => env('DHL_USER', ''),
                'DHL_PASSWORD'    => env('DHL_PASSWORD', ''),
                'DHL_SAP'         => env('DHL_SAP',''),
                'DHL_ACCOUNT'     => env('DHL_ACCOUNT', ''),
                'DHL_COUNTRY'     => env('DHL_COUNTRY', 'PL'),
                'DHL_CURRENCY'    => env('DHL_CURRECY', 'PLN'),
                'DHL_COUNTRYCODE' => env('DHL_COUNTRYCODE', ''),
                'DHL_POSTALCODE'  => env('DHL_POSTALCODE', ''),
                'DHL_CITY'        => env('DHL_CITY', ''),
                'DHL_PICKUPFROM'  => env('DHL_PICKUPFROM', '14:00'),
                'DHL_PICKUPTO'    => env('DHL_PICKUPTO', '17:00'),
            ],

            2 =>[

                'DHL_USER'        => env('DHL_USER2', ''),
                'DHL_PASSWORD'    => env('DHL_PASSWORD2', ''),
                'DHL_SAP'         => env('DHL_SAP2',''),
                'DHL_ACCOUNT'     => env('DHL_ACCOUNT2', ''),
                'DHL_COUNTRY'     => env('DHL_COUNTRY2', 'PL'),
                'DHL_CURRENCY'    => env('DHL_CURRECY2', 'PLN'),
                'DHL_COUNTRYCODE' => env('DHL_COUNTRYCODE2', ''),
                'DHL_POSTALCODE'  => env('DHL_POSTALCODE2', ''),
                'DHL_CITY'        => env('DHL_CITY2', ''),
                'DHL_PICKUPFROM'  => env('DHL_PICKUPFROM2', '14:00'),
                'DHL_PICKUPTO'    => env('DHL_PICKUPTO2', '17:00'),
            ],           

        ],
        'package' => [

            'SMALL_HEIGHT'     => 10,
            'SMALL_WIDTH'      => 10,
            'SMALL_LENGTH'     => 20,
            'SMALL_WEIGHT'     => 1.0,

            'MEDIUM_HEIGHT'    => 20,
            'MEDIUM_WIDTH'     => 20,
            'MEDIUM_LENGTH'    => 20,
            'MEDIUM_WEIGHT'    =>  1.0,

            'BIG_HEIGHT'       => 40,
            'BIG_WIDTH'        => 40,
            'BIG_LENGTH'       => 40,
            'BIG_WEIGHT'       =>  1.0,    

            'PALLET_HEIGHT'    => 100,
            'PALLET_WIDTH'     =>  80,
            'PALLET_LENGTH'    => 120,
            'PALLET_WEIGHT'    =>  25.0,    

        ]
    ];