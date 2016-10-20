<?php

return [
    //拉取需要的服务列表，此处填写注册到注册中心的的app name，如果无需拉去任何服务，app_names为空array即可
    'app_names' => [
        'material-api' //本地开发环境不需要这个服务
    ],
    //拉取服务配置 固定配置，业务无需修改
    'discovery' => [
        'host' => 'etcd-dev.s.qima-inc.com',
        'port' => 2379,
        'timeout' => 30000,
        'uri' => '/v2/keys',
        'protocol' => 'nova',
        'namespace' => 'com.youzan.service', //固定配置与业务无关，下面配置同理
        'loop_time' => 1000,     //worker定时器任务执行时间（判断是否已拉取到服务）
    ],
    //监听服务配置 固定配置，业务无需修改
    'watch' => [
        'host' => 'etcd-dev.s.qima-inc.com',
        'port' => 2379,
        'timeout' => 30000,
        'uri' => '/v2/keys',
        'protocol' => 'nova',
        'namespace' => 'com.youzan.service',
        'loop_time' => 5000,  //worker定时器任务执行时间（判断执行watch的worker是否live）
    ],
    //监听本地服务列表变化配置
    'watch_store' => [
        'loop_time' => 1000, //worker定时器任务执行时间(判断本地的服务列表是否变化)
    ],
    //服务注册配置 固定配置业务无需修改
    'register' => [
        'host' => 'etcd-dev.s.qima-inc.com',
        'port' => 8687,
        'uri' => '/register',
        'timeout' => 30000,
        'protocol' => 'nova',
        'namespace' => 'com.youzan.service',
        'enable_register' => 0,
    ],
];
