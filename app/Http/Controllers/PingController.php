<?php

namespace App\Http\Controllers;

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

use bps\BpsClient;
use bps\Blog;

class PingController extends Controller{

    public function ping()
    {
        new ThriftClassLoader();
        $socket = new TSocket('localhost', 9090);
        $transport = new TBufferedTransport($socket, 1024, 1024);
        $protocol = new TBinaryProtocol($transport);
        $client = new BpsClient($protocol);
        $transport->open();
        $client->ping();
        var_dump(new Blog());
        var_dump("after ping ----------");
        var_dump($client->mget_blog());
        return 'hello cg';
    }
}