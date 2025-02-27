<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [env('APP_URL', 'https://zany-space-spoon-9r9v7j6v4xr2pg5v.app.github.dev')],
    'allowed_origins_patterns' => ['*'],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['*'],
    'max_age' => 0,
    'supports_credentials' => true,
];
