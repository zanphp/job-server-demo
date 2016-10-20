<?php

namespace Zan\Framework\Components\JobServer\Controller\Job;


use Zan\Framework\Components\JobServer\JobMode;
use Zan\Framework\Components\JobServer\Monitor\JobMonitor;
use Zan\Framework\Foundation\Domain\HttpController;
use Zan\Framework\Network\Http\Response\JsonResponse;

class MonitorController extends HttpController
{
    public function poolStat()
    {
        $status = (yield JobMonitor::getConnectionPoolStatus());
        yield new JsonResponse($status);
    }

    public function jobList()
    {
        $ret = (yield JobMonitor::getJobList());
        yield new JsonResponse($ret);
    }
}