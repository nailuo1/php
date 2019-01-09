<?php

require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

use PhpAmqpLib\Message\AMQPMessage;

$data=implode('',array_slice($argv,1));

if(empty($data))
{
	$data="Hello World!";
}

//连接到rabbitmq;
$connection = new AMQPStreamConnection('192.168.0.200', 5672, 'wuwenjie', '18255115332@wwj');

//定义管道
$channel = $connection->channel();

$channel->queue_declare('hello', false, true, false, false);

//将消息发送到队列
$msg = new AMQPMessage($data);

$channel->basic_publish($msg, '', 'hello');

echo " [x] 已发送",$data,"\n";

$channel->close();

$connection->close();


?>