<?php

return [
//    "test_timeout" => [
//        "uri" => "job/task/testTimeout",
//        "cron"  => "* * * * * *",
//    ],
//    "test_exception" => [
//        "uri" => "job/task/testException",
//        "cron"  => "* * * * * *",
//    ],


//    "test_tick_1" => [
//        "uri" => "job/task/timer",
//        "cron"  => "*/1 * * * * *",
//        "strict" => false,
//    ],

//    "test_tick_2" => [
//        "uri" => "job/task/timer",
//        "cron"  => "*/1 * * * * *",
//        "strict" => false,
//    ],
//    "test_tick_3" => [
//        "uri" => "job/task/timer",
//        "cron"  => "*/1 * * * * *",
//        "strict" => false,
//    ],

    
    "push_mq1" => [
        "uri" => "job/task/product",
        "cron"  => "* * * * * *",
        "timeout" => 3000,
    ],
    "push_mq2" => [
        "uri" => "job/task/product",
        "cron"  => "* * * * * *",
        "timeout" => 3000,
    ],
    "push_mq3" => [
        "uri" => "job/task/product",
        "cron"  => "* * * * * *",
        "timeout" => 3000,
    ],
    "push_mq4" => [
        "uri" => "job/task/product",
        "cron"  => "* * * * * *",
        "timeout" => 3000,
    ],
    "push_mq5" => [
        "uri" => "job/task/product",
        "cron"  => "* * * * * *",
        "timeout" => 3000,
    ],



//
//    [
//        "uri" => "job/task/product",
//        "cron"  => "* * * * * *",
//        // "method" => "GET",
//        // "header" => [ "x-foo: bar", ],
//        // "body" => "",
//    ],
//
//    [
//        "uri" => "job/task/product",
//        "cron"  => "* * * * * *",
//        // "method" => "GET",
//        // "header" => [ "x-foo: bar", ],
//        // "body" => "",
//    ],
//
//    [
//        "uri" => "job/task/product",
//        "cron"  => "* * * * * *",
//        // "method" => "GET",
//        // "header" => [ "x-foo: bar", ],
//        // "body" => "",
//    ],
];