
<?php

return [
    'syslog_test' => [
        'engine'=> 'syslog',
        'host' => '192.168.66.204',
        'port' => '5140',
        'timeout' => 5000,
        'persistent' => true,
        'pool' => [
            'maximum-connection-count' => 50,
            'minimum-connection-count' => 1,
            'keeping-sleep-time' => '10',
            'init-connection'=> 1,
        ],
    ],
];