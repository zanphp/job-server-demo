<?php

return [
    "mq_consume1" => [
        "uri" => "job/task/consume",
        "topic" => "zan_mqworker_test",
        "channel" => "ch1",
         "coroutine_num" => 2,
        "timeout" => 3000,
        // "method" => "GET",
        // "header" => [ "x-foo: bar", ],
        // "body" => "",
    ],
];