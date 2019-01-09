<?php

require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

use PhpAmqpLib\Message\AMQPMessage;

$data=implode('',array_slice($argv,1));

if(empty($data))
{
	$data="info:Hello World!";
}

//连接到rabbitmq;
$connection = new AMQPStreamConnection('192.168.0.200', 5672, 'wuwenjie', '18255115332@wwj');

//定义管道
$channel = $connection->channel();

//exchange信息
$channel->exchange_declare('logs', 'fanout', false, false, false);


$msg = new AMQPMessage($data);

$channel->basic_publish($msg, 'logs');

echo ' [x] Sent ', $data, "\n";

$channel->close();
$connection->close();

?>