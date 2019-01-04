<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$host   = "192.168.0.200";
$port   = 15672;
$user   = "wuwenjie";
$pass   = "jun5201314";

$vhost  = "/";

try{
    $connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
}catch (Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";die;
}

echo "ok";
die;

$channel = $connection->channel();
?>