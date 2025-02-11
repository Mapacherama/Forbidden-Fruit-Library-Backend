<?php

return [
    'paths' => ['api/*'], // Allow API requests
    'allowed_methods' => ['*'], // Allow all HTTP methods
    'allowed_origins' => ['*'], // Allow all origins (Vue frontend)
    'allowed_headers' => ['*'], // Allow all headers
    'supports_credentials' => false,
];
