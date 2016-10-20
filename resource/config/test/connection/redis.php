<?php
/**
 * Created by PhpStorm.
 * User: heize
 * Date: 16/4/5
 * Time: 下午4:53
 */
return [
    'default_write' => [
        'engine'=> 'redis',
        'host' => 'redis-dev.s.qima-inc.com',
        'port' => 6379,
        'pool'  => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 1,
            'keeping-sleep-time' => '10',
            'init-connection'=> 1,
        ],
    ],
];
