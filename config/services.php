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
        'client_id' => env('GOOGLE_KEY','834953885970-i7l2mv64qlkldlqp38iodbg9v97ed827.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_SECRET','h_chgtmW8XEa6ceV5mu69js8'),
        'redirect' => env('GOOGLE_REDIRECT_URI','http://localhost.blog.com/blog/google'),  
    ], 
    'facebook' => [
        'client_id'     => env('FACEBOOK_ID','2017227168545554'),
        'client_secret' => env('FACEBOOK_SECRET','ea96f3d60ce13fbbee51f809f949a3b3'),
        'redirect'      => env('FACEBOOK_URL','http://localhost.blog.com/blog/facebook/callback'),
    ],
    'twitter' => [
        'client_id'     => env('TWITTER_ID'),
        'client_secret' => env('TWITTER_SECRET'),
        'redirect'      => env('TWITTER_URL'),
    ],

];
