<?php

require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('192.168.0.200', 5672, 'wuwenjie', '18255115332@wwj');

$channel = $connection->channel();

$channel->queue_declare('hello', false, true, false, false);

$msg = new AMQPMessage('Hello World!');

$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";

$channel->close();

$connection->close();


?>