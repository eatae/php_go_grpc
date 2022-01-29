#!/bin/bash

#echo "-----Generate .proto files in to grpc_service/protos-----"
#
#docker exec -i -t php_go_grpc-go \
#  protoc --go_out=. --go_opt=paths=source_relative \
#  --go-grpc_out=. --go-grpc_opt=paths=source_relative ./protos/grpc_service.proto

echo "Start"

start(){ echo "New start"; }
if [[ $1 == "start" ]]; then start; fi


# rest_service composer install
rcompi(){
  cd ./docker && docker exec -i php_go_grpc-php-cli bash -c "cd ./rest_service && composer install"
}
if [[ $1 == "rcompi" ]]; then rcompi; fi
