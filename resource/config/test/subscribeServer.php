<?php
/**
 * Created by PhpStorm.
 * User: xiaoniu
 * Date: 16/8/23
 * Time: 下午9:32
 */
return [
    'host'          => '0.0.0.0',
    'port'          => '8103',
    'config' => [
        'worker_num' => 1,
        'dispatch_mode' => 3,
        'max_request' => 100000,
        'reactor_num' => 1,
        'daemonize' => false,
    ],
];