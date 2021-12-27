#!/bin/bash

echo "-----Generate .proto files in to grpc_service/protos-----"

docker exec -i -t php_go_grpc-go \
  protoc --go_out=. --go_opt=paths=source_relative \
  --go-grpc_out=. --go-grpc_opt=paths=source_relative ./protos/grpc_service.proto