<?php

return [
    'default_write' => [
        'engine'=> 'mysqli',
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => '',
        'database' => 'test',
        'port' => '3306',
        'pool'  => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 2,
            'heartbeat-time' => 35000,
            'init-connection'=> 2,
        ],
    ],
    "cluster" => [
        'engine'=> 'mysqli',
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => '',
        'database' => 'test',
        'port' => '3306',
        'pool'  => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 0,
            'heartbeat-time' => 35000,
            'init-connection'=> 0,
        ],
    ],
];
