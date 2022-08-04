<?php

return [

    'debug'    => true,

    // https://www.workerman.net/doc/gateway-worker/register.html
    'register' => [

        'ip' => '0.0.0.0',

        'port' => 1236,

    ],

    // https://www.workerman.net/doc/gateway-worker/business-worker.html
    'worker'   => [

        'registerAddress' => '127.0.0.1:1236',

        'name'  => 'BusinessWorker',

        // 一般为CPU的核数的2-3倍
        'count' => 2,

        'ip' => ''
    ],

    // https://www.workerman.net/doc/gateway-worker/gateway.html
    'gateway'  => [

        'registerAddress' => '127.0.0.1:1236',

        'protocol' => 'websocket',

        'name'  => 'Gateway',

        // 一般为CPU的核数
        'count' => 1,

        'lanIp' => '127.0.0.1',

        'startPort' => '2000',

        'ip' => '0.0.0.0',

        'port' => 60001,
    ],

];
