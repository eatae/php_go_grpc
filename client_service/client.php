<?php

//phpinfo(); exit();

require "./vendor/autoload.php";

use Grpc_service\GrpcServiceClient;

$host = 'localhost:8080';

$client = new GrpcServiceClient(
    $host,
    ['credentials' => Grpc\ChannelCredentials::createInsecure()]
);

$request = new \Grpc_service\GetRequest();

/**
 * @var $response \Grpc_service\GetResponse
 */
list($response, $status) = $client->GetSettings($request)->wait();

if ($status->code !== Grpc\STATUS_OK) {
    echo "ERROR: " . $status->code . ", " . $status->details . PHP_EOL;
    exit(1);
}
var_dump($response->serializeToJsonString()) . PHP_EOL;