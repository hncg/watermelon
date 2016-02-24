<?php

namespace App\Http\Controllers;

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

use App\models\Article;
use bps\BpsClient;

class PingController extends Controller{

    public function ping()
    {
        var_dump((new Article())->query());
        return 1;
        $socket = new TSocket('localhost', "9090");
        $transport = new TBufferedTransport($socket, 1024, 1024);
        $protocol = new TBinaryProtocol($transport);
        $client = new BpsClient($protocol);
        $transport->open();
        $client->ping();
        call_user_func(array($client, 'mget_blog'));
        var_dump("after ping ----------");
        var_dump($client->mget_blog());
        return 'hello cg';
    }
}