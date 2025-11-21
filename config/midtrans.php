<?php

return [

    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'isProduction' => false, // true untuk production
    'isSanitized' => true,
    'is3ds' => true,

    'curl_options' => [
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_CAINFO => storage_path('certs/cacert.pem'), // Simpan CA bundle di storage
    ]
];
