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

    'github' => [
    'client_id' => env('GITHUB_CLIENT_ID'),
    'client_secret' => env('GITHUB_CLIENT_SECRET'),
    'redirect' => env('GITHUB_REDIRECT_URL'),
    ],

    'facebook' => [
    'client_id' => '282860519724425',
    'client_secret' => '2407dc75d44992cde3cfad1be5f94707',
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URL'),
    ],
    'tmdb' => [
    'token' => 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyNjMyMTdiYzg5ZDU2NzZmYmM0ZTA4NzE5YWQxNThlNyIsInN1YiI6IjVmMDZlODlmMWQxYmY0MDAzNTYyODliOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.yrHdMsUFb9QiboATY541wgGQMR7asJNMDiJsem3TmdE',
    ],
];
