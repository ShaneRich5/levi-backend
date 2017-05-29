<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |
     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
     | to accept any value.
     |
     */
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Content-Type', 'X-Requested-With', 'Access-Control-Allow-Origin'],
    'allowedMethods' => array('DELETE', 'GET', 'POST', 'PUT'),
    'exposedHeaders' => [],
    'maxAge' => 0,
];

