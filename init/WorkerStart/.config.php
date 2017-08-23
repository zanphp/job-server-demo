<?php

use Zan\Framework\Components\JobServer\WorkerStart\InitializeJobServer;
use ZanPHP\NSQ\InitializeNSQ;

return [
    // !!! 注意配置顺序, SQS要优先JobServer初始化
    InitializeNSQ::class,
    InitializeJobServer::class,
];