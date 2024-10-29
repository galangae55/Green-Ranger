<?php

return [

    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'isProduction' => false, // true untuk production
    'isSanitized' => true,
    'is3ds' => true,
];
