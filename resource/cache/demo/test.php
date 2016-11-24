<?php

return [
    'common'           => [
        'connection'  => 'redis.default_write',
    ],
    'test' => [
        'key' => 'test_abc_%s',
        'exp' => 10
    ],

    'mgetset' => [
        'key' => 'key_%s_%d',
        'exp' => 100,
        'encode' => 'gz',
    ],
];