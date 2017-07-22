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
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'firebase' => [
        'api_key' => 'AIzaSyAL8ZOrV59wqYvJe4xSQXED3NiGxKW8FZ8', // Only used for JS integration
        'auth_domain' => 'levi-99180.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://levi-99180.firebaseio.com',
        'secret' => 'TAHWV2Z5QKvJEqzetUFqZ6fllpxV5dY32WaaLEiY',
        'storage_bucket' => 'levi-99180.appspot.com', // Only used for JS integration
    ]

];
