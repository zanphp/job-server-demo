<?php
/**
 * Created by PhpStorm.
 * User: xiaoniu
 * Date: 16/8/23
 * Time: 下午9:47
 */
return [
    'app_names' => [
        'material-api',
    ],
    'novaApi' => [
        'material-api' => [
            'path'  => 'vendor/nova-service/material/gen-php',
            'namespace' => 'Com\\Youzan\\Material\\',
        ],
    ],
    'connection' => [
        'material-api' => [
            'host' => '10.9.49.57',
            'port' => '8600',
        ],
        'TcpDemo' => [
            'host' => '127.0.01',
            'port' => '8020',
        ],
    ],
];
