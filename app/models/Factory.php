<?php
namespace APP\models;

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

class Factory
{
    protected $client = null;

    protected $func = null;

    protected $args = null;

    public function __construct($server = '')
    {

        $serverClient = $server .'\\' . ucfirst($server) . 'Client';
        $portKey = 'rpc.' . $server;
        new ThriftClassLoader();
        $socket = new TSocket('localhost', (int) config($portKey, ''));
        $transport = new TBufferedTransport($socket, 1024, 1024);
        $protocol = new TBinaryProtocol($transport);
        $client = new $serverClient($protocol);
        $transport->open();
        $this->client = $client;
    }

    public function with($args = null)
    {
        $this->args = $args;
        return $this;
    }

    public function call($func = '')
    {
        return new Wrapper(call_user_func(array($this->client, $func), $this->args));
    }

}
?>