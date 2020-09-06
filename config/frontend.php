<?php

return [
    'url' => env('FRONTEND_URL', 'http://localhost:8000'),
    'email_verify_url' => env('FRONTEND_EMAIL_VERIFY_URL', '/verify-email?queryURL='),
];
