<?php

return [
    "mq_consume1" => [
        "uri" => "job/task/consume",
        "topic" => "zan_mqworker_test",
        "channel" => "ch1",
        "timeout" => 3000,
        "coroutine_num" => 1,
        // "method" => "GET",
        // "header" => [ "x-foo: bar", ],
        // "body" => "",
    ],
//    "mq_consume2" => [
//        "uri" => "job/task/consume",
//        "topic" => "zan_mqworker_test",
//        "channel" => "ch1",
//        "timeout" => 3000,
//        "coroutine_num" => 1,
//    ],
];