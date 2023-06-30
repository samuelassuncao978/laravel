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

    "mailgun" => [
        "domain" => env("MAILGUN_DOMAIN"),
        "secret" => env("MAILGUN_SECRET"),
        "endpoint" => env("MAILGUN_ENDPOINT", "api.mailgun.net"),
    ],

    "mapbox" => [
        "public_token" => env("MAPBOX_PUBLIC_TOKEN"),
    ],

    "postmark" => [
        "token" => env("POSTMARK_TOKEN"),
    ],

    "ses" => [
        "key" => env("AWS_ACCESS_KEY_ID"),
        "secret" => env("AWS_SECRET_ACCESS_KEY"),
        "region" => env("AWS_DEFAULT_REGION", "us-east-1"),
    ],

    'google' => [
        'client_id' => env('GMAIL_CLIENT_ID'),
        'client_secret' => env('GMAIL_CLIENT_SECRET'),
        'redirect_uri' => env('GMAIL_REDIRECT_URI'),
        'approval_prompt' => 'force',
        'access_type' => 'offline',
        'include_granted_scopes' => true,
        'authorize_url' => env('GMAIL_AUTHORIZE_URL'),
        'token_url' => env('GMAIL_TOKEN_URL'),
    ],

    'microsoft_graph' => [
        'client_id' => env('OUTLOOK_CLIENT_ID'),
        'client_secret' => env('OUTLOOK_CLIENT_SECRET'),
        'redirect_uri' => env('OUTLOOK_REDIRECT_URI'),
        'authorize_url' => env('OUTLOOK_AUTHORIZE_URL'),
        'token_url' => env('OUTLOOK_TOKEN_URL'),
        'scope' => 'offline_access User.Read Calendars.ReadWrite',
    ],
];
