package main

import (
	p "php_go_grpc/grpc_service/proto"
)

var port = ":8080"

type GrpcService struct {
	p.UnimplementedGrpcServiceServer
}

//func (GrpcService) GetSettings (ctx context.Context, req *p.GetRequest) (*p.SetResponse, error) {
//	response := &p.GetResponse {
//
//	}
//}
