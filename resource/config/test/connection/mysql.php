<?php

return [
    'default_write' => [
        'engine'=> 'mysqli',
        'host' => '10.9.34.172',
        'user' => 'db_koudaitong',
        'password' => 'db_koudaitong',
        'database' => 'db_koudaitong',
        'port' => '3306',
        'pool'  => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 1,
            'heartbeat-time' => 35000,
            'init-connection'=> 1,
        ],
    ],
    "cluster" => [
        'engine'=> 'mysqli',
        'host' => '10.9.26.62',
        'user' => 'user_koudaitong',
        'password' => 'ocfLsVO7l2B3TMOPmpSX',
        'database' => 'db_koudaitong',
        'port' => '3007',
        'pool'  => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 1,
            'heartbeat-time' => 35000,
            'init-connection'=> 1,
        ],
    ],
];
