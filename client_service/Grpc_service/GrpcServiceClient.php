<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc_service;

/**
 * Service 
 */
class GrpcServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Grpc_service\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSettings(\Grpc_service\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc_service.GrpcService/GetSettings',
        $argument,
        ['\Grpc_service\GetResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Grpc_service\SetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetSettings(\Grpc_service\SetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc_service.GrpcService/SetSettings',
        $argument,
        ['\Grpc_service\SetResponse', 'decode'],
        $metadata, $options);
    }

}
