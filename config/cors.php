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
    'allowedHeaders' => ['Access-Control-Allow-Headers', 'Authorization', 'Content-Type', 'X-Requested-With', 'Access-Control-Allow-Origin'],
    'allowedMethods' => array('DELETE', 'GET', 'POST', 'PUT'),
    'exposedHeaders' => ['Authorization'],
    'maxAge' => 0,
];

