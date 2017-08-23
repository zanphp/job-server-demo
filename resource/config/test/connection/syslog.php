
<?php

return [
    'syslog_test' => [
        'engine'=> 'syslog',
        'host' => '127.0.0.1',
        'port' => '5140',
        'timeout' => 5000,
        'persistent' => true,
        'pool' => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 0,
            'init-connection'=> 0,
        ],
    ],
];