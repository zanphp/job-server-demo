<?php

namespace  Zan\Framework\Components\JobServer\Demo\Controller\Job;


use Com\Youzan\Material\General\Service\TokenService;
use Zan\Framework\Components\JobServer\Demo\Controller\Job\Dao\AttachmentDao;
use Zan\Framework\Components\JobServer\JobProcessor\JobController;
use Zan\Framework\Store\Facade\Cache;
use Zan\Framework\Utilities\Types\Time;

// nsq

// http://nsq-dev.s.qima-inc.com:4161/create_topic?topic=zan_mqworker_test
// curl -X POST "http://nsq-dev.s.qima-inc.com:4161/topic/create?topic=zan_mqworker_test"
// curl -X POST "http://nsq-dev.s.qima-inc.com:4161/channel/create?topic=zan_mqworker_test&channel=ch1"

// curl -X POST "http://127.0.0.1:4151/topic/create?topic=zan_mqworker_test"

// post 需要header支持
// -H "Content-type: application/x-www-form-urlencoded" -X POST --data "foo=bar" job/task/product?name=xiaofeng

// json 需要header支持
// -H "Content-type: Content-type: application/json" -X POST --data '{"foo": "bar"}' job/task/product?name=xiaofeng

class TaskController extends JobController
{
    const TEST_TOPIC = "zan_mqworker_test";

    // 通过cron提交任务
    public function product()
    {
        try {
             yield $this->testRedis();
             yield $this->testMysql();
             yield $this->testInvokeService();

            yield taskSleep(1000);

            $ret = (yield $this->submit(static::TEST_TOPIC, ["hello"]));
            if ($ret["result"] !== "ok") {
                echo $ret["error"];
            }

            yield $this->jobDone();
        } catch (\Exception $ex) {
            echo_exception($ex);
            yield $this->jobError($ex);
        }
    }

    // mq worker: 消费mq任务
    public function consume()
    {
        try {
            yield $this->testRedis();
            yield $this->testMysql();
            yield $this->testInvokeService();

            $job = $this->getJob();
            // var_dump($job->jobKey);
            yield taskSleep(1000);

            // throw new \Exception("test........");
            yield $this->jobDone();

            // yield $this->getJobManager()->stop();
        } catch (\Exception $ex) {
            echo_exception($ex);
            yield $this->jobError($ex);
        }
    }


    
    public function timer()
    {
        yield taskSleep(100);
        yield $this->jobDone();
    }

    public function testTimeout()
    {
        yield taskSleep(1000);
        yield $this->jobDone();
    }

    public function testException()
    {
        throw new \RuntimeException("hello runtimeexception");
        yield null;
    }

    protected function testRedis()
    {
        $v = "hello";
        yield Cache::set("demo.test.test", 1, $v);
        $ret = (yield Cache::get("demo.test.test", 1));
        assert($v === $ret);
    }
    
    protected function testInvokeService()
    {
        $token = (yield TokenService::getInstance()->getToken(1, "test"));
        assert(strlen($token) > 0);
    }

    protected function testMysql()
    {
        $ret = (yield AttachmentDao::getInstance()->getListByKdtIdAttachmentIds(1, range(1, 100)));
        assert($ret);
    }

    protected function testLog()
    {

    }

    protected function testHttpClient()
    {

    }

    protected function testKV()
    {

    }

    protected function testES()
    {

    }

    protected function dumpRequest()
    {
        // echo "JSON:\n";
        // var_dump($this->request->json->all());

        echo "BODY:\n";
        var_dump($this->request->getContent());

        echo "POST: REQUEST:\n";
        var_dump($this->request->request->all());

        echo "GET: QUERY:\n";
        var_dump($this->request->query->all());

        echo "HEADER:\n";
        var_dump($this->request->headers->all());

        $serv = $this->request->server->all();
        unset($serv["__JOB__"]);
        unset($serv["__JOB_MGR__"]);
        echo "SERVER:\n";
        var_dump($serv);
    }
}