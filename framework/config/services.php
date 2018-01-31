<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '696025184931-5b0skcm0edbh6t4a2hm169rp6hj9n287.apps.googleusercontent.com', 
        'client_secret' => 'gAJPAVMwnQtHXhYzlzn2OXNi', 
        'redirect' => 'http://localhost/admin2509/admin/login/google/callback',
    ],
    'facebook' => [
        'client_id' => '171451653474960', 
        'client_secret' => '24e23818cbb180d40044abd4ca0279db', 
        'redirect' => 'http://localhost/admin2509/admin/login/facebook/callback',
    ],

];
