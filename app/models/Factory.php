<?php
namespace App\models;

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;
use \bps\UserException;

class Factory
{
    protected $client = null;

    protected $func = null;

    protected $args = null;

    public function __construct($server = '')
    {

        $serverClient = $server .'\\' . ucfirst($server) . 'Client';
        $rpcConfig = config('rpc.' . $server);
        $socket = new TSocket($rpcConfig['address'], $rpcConfig['port']);
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
        try{
            return new Wrapper(call_user_func_array(array($this->client, $func), $this->args));
        } catch(UserException $e) {
            // var_dump($e); //打印会出bug ！！！！！
            return new Wrapper(null);
        }
    }

}
?>