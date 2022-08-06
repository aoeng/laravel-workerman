<?php

return [

    // https://www.workerman.net/doc/gateway-worker/register.html
    'register' => [

        'ip' => '0.0.0.0',

        'port' => 1236,

    ],

    // https://www.workerman.net/doc/gateway-worker/business-worker.html
    'worker'   => [

        'registerAddress' => '127.0.0.1:1236',

        'name' => 'BusinessWorker',

        'count' => 2,     // 一般为CPU的核数的2-3倍

        'ip' => ''
    ],

    // https://www.workerman.net/doc/gateway-worker/gateway.html
    'gateway'  => [

        'registerAddress' => '127.0.0.1:1236',

        'protocol' => 'websocket',

        'name' => 'Gateway',

        'count' => 1,    // 一般为CPU的核数

        'lanIp' => '127.0.0.1',

        'startPort' => '2000',

        'ip' => '0.0.0.0',

        'port' => 60001,

        'ssl' => false, //开启 wss 协议

        'content' => [
            'ssl' => [
                'local_cert'  => env('WORKERMAN_SSL_CERT', ''), // .pem or .crt
                'local_pk'    => env('WORKERMAN_SSL_KEY', ''), // .key
                'verify_peer' => false,
            ]
        ],
    ],
];
