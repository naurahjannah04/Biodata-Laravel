<?php

return [
    'admin_email' => env('BIODATA_ADMIN_EMAIL', env('APP_ENV') === 'local' ? 'admin@example.com' : null),
    'admin_password' => env('BIODATA_ADMIN_PASSWORD', env('APP_ENV') === 'local' ? 'password' : null),
];
