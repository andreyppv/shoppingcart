<?php

return [

	// The default gateway to use
	'default' => 'paypalpro',

	// Add in each gateway here
	'gateways' => [
		'paypal' => [
			'driver'  => 'PayPal_Express',
			'options' => [
				'solutionType'   => '',
				'landingPage'    => '',
				'headerImageUrl' => '',
                'username' => env('PAYPAL_USERNAME', ''),
                'password' => env('PAYPAL_PASSWORD', ''),
                'signature'=> env('PAYPAL_SIGNATURE', ''),
                'testMode' => env('PAYPAL_SANDBOX', false),
			]
		],
        'paypalrest' => [
            'driver'  => 'PayPal_Rest',
            'options' => [
                'clientId'  => env('PAYPALREST_CLIENT_ID', ''),
                'secret'    => env('PAYPALREST_SECRET', ''),
                'testMode'  => env('PAYPALREST_SANDBOX', false),
            ]
        ],
        'paypalpro' => [
            'driver'  => 'PayPal_Pro',
            'options' => [
                'username'  => env('PAYPALPRO_USERNAME', ''),
                'password'  => env('PAYPALPRO_PASSWORD', ''),
                'signature' => env('PAYPALPRO_SIGNATURE', ''),
                'testMode'  => env('PAYPALPRO_SANDBOX', false),
            ]
        ],
	]

];