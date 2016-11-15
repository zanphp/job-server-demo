<?php

use Zan\Framework\Components\JobServer\WorkerStart\InitializeJobServer;
use Zan\Framework\Components\Nsq\InitializeSQS;

return [
    // !!! 注意配置顺序, SQS要优先JobServer初始化
    InitializeSQS::class,
    InitializeJobServer::class,
];