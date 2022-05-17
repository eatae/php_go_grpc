#!/bin/bash

#echo "-----Generate .proto files in to grpc_service/protos-----"
#
#docker exec -i -t php_go_grpc-go \
#  protoc --go_out=. --go_opt=paths=source_relative \
#  --go-grpc_out=. --go-grpc_opt=paths=source_relative ./protos/grpc_service.proto

echo "Start"

start(){ echo "New start"; }
if [[ $1 == "start" ]]; then start; fi


## rest_service composer install
#restcompinstall(){
#  cd ./docker && docker exec -i php_go_grpc-php-cli bash -c "cd ./rest_service && composer install"
#}
#if [[ $1 == "restcompinstall" ]]; then restcompinstall; fi
#
## rest_service composer require
#restcomprequire(){
#  cd ./docker && docker exec -i php_go_grpc-php-cli bash -c "cd ./rest_service && composer require $1"
#}
#if [[ $1 == "restcomprequire" ]]; then restcomprequire $2; fi


pass(){
  cd ./docker && docker exec -it php_go_grpc-php-cli bash -c "cd ./$1_service && $2 $3 $4 $5 $6 $7"
}
if [[ $1 == "pass" ]]; then pass $2 $3 $4 $5 $6 $7 $8; fi


automobile(){
  cd ./docker && docker exec -i php_go_grpc-php-cli bash -c "cd ./rest_service && $1 $2 $3 $4 $5 $6 $7"
}
if [[ $1 == "automobile" && $2 == "cs-fix" ]]; then automobile "./vendor/bin/php-cs-fixer" "fix"; fi
