<?php

namespace Zan\Framework\Components\JobServer\Controller\Index;


use Zan\Framework\Foundation\Domain\HttpController;
use Zan\Framework\Network\Http\Response\Response;

class IndexController extends HttpController
{
    public function index()
    {
        yield new Response();
    }
}