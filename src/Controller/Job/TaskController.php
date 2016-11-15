<?php

namespace  Zan\Framework\Components\JobServer\Demo\Controller\Job;


use Com\Youzan\Material\General\Service\TokenService;
use Zan\Framework\Components\JobServer\Demo\Controller\Job\Dao\AttachmentDao;
use Zan\Framework\Components\JobServer\JobProcessor\JobController;
use Zan\Framework\Sdk\Queue\NSQ\Msg;
use Zan\Framework\Sdk\Queue\NSQ\Queue;
use Zan\Framework\Store\Facade\Cache;
use Zan\Framework\Utilities\Types\Time;

class TaskController extends JobController
{
    const TEST_TOPIC = "zan_mqworker_test";

    // 通过cron提交任务
    public function product()
    {
        try {
//             yield $this->testRedis();
//             yield $this->testMysql();
//             yield $this->testInvokeService();

            // $ret = (yield $this->submit(static::TEST_TOPIC, "hello"));
            $ret = (yield $this->submit(static::TEST_TOPIC, ["key" => "hello"]));
            if ($ret["result"] !== "ok") {
                echo $ret["error"];
            }
            yield taskSleep(100);

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
//            yield $this->testRedis();
//            yield $this->testMysql();
//            yield $this->testInvokeService();

            $job = $this->getJob();
            // var_dump($job->jobKey);
            var_dump($job->body);
            // yield taskSleep(1000);

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
//        assert($v === $ret);
    }
    
    protected function testInvokeService()
    {
        $token = (yield TokenService::getInstance()->getToken(1, "test"));
//        assert(strlen($token) > 0);
    }

    protected function testMysql()
    {
        $ret = (yield AttachmentDao::getInstance()->getListByKdtIdAttachmentIds(1, range(1, 100)));
//        assert($ret);
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


    public function submitTask()
    {
        try {
            $n = $this->request->get("n", 1000);
            $queue = new Queue();
            $loading = ["\\", "-", "/", "|"];
            while($n--) {
                $c = $loading[$n % 4];
                $this->replaceOut("$c==============$c\nPublishing...$n\n$c==============$c");
                yield $queue->publish(static::TEST_TOPIC, Msg::fromClient(json_encode(["hello"])));
            }

            yield $this->jobDone();
        } catch (\Exception $e) {
            yield $this->jobError($e);
        }
    }

    private function replaceOut($str)
    {
        $numNewLines = substr_count($str, "\n");
        echo chr(27) . "[0G"; // Set cursor to first column
        echo $str;
        echo chr(27) . "[" . $numNewLines ."A"; // Set cursor up x lines
    }

    // http://10.9.6.49:4171/topics/zan_mqworker_test
    // sudo nohup /data/users/chuxiaofeng/job-server-demo/bin/jobserv >/data/users/chuxiaofeng/job-server-demo/log 2>&1 &
    // sudo php /data/users/chuxiaofeng/job-server-console/bin/jobserv job/task/submitTask?n=1000
}