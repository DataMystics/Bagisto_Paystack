<?php

return [
    'paystack' => [
        'code' => 'paystack',
        'title' => 'Paystack',
        'description' => 'Paystack Payment Gateway',
        'active' => true,
        'sort' => 1,
        'sandbox' => true,
        'public_key' => env('PAYSTACK_PUBLIC_KEY'),
        'secret_key' => env('PAYSTACK_SECRET_KEY'),
    ],
];
