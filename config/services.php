<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '773769823142-jl1c7tkealdsjq853t6f07o54eso84uh.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/gfm-store/public/login/google/callback',
      ], 

    'facebook' => [
        'client_id' => '266122145528427',
        'client_secret' => 'e5c58c1c3b4b86ab2fa85bb2e53e6fd1',
        'redirect' => 'https://localhost/gfm-store/public/login/facebook/callback',
    ],

];
