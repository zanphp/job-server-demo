<?php

namespace Zan\Framework\Components\JobServer\Demo\Controller\Job;

use Zan\Framework\Components\JobServer\Monitor\JobMonitor;
use Zan\Framework\Foundation\Domain\HttpController;
use Zan\Framework\Network\Http\Response\JsonResponse;

class MonitorController extends HttpController
{
    // 监控作业信息
    public function jobList()
    {
        $ret = (yield JobMonitor::getJobList());
        yield new JsonResponse($ret);
    }

    // 监控连接池状态
    public function poolStat()
    {
        $status = (yield JobMonitor::getConnectionPoolStatus());
        yield new JsonResponse($status);
    }
}