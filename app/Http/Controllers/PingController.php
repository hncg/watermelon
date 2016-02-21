<?php

namespace App\Http\Controllers;

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use vps\VpsClient;

class PingController extends Controller{

    public function ping()
    {
        new ThriftClassLoader();
        $socket = new TSocket('localhost', 9090);
        $transport = new TBufferedTransport($socket, 1024, 1024);
        $protocol = new TBinaryProtocol($transport);
        $client = new VpsClient($protocol);
        $transport->open();
        $client->ping();
        return 'hello cg';
    }
}