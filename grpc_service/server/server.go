package main

import (
	"context"
	"fmt"
	"google.golang.org/grpc"
	"net"
	"php_go_grpc/grpc_service/data"
	p "php_go_grpc/grpc_service/proto"
)

var port = ":82"

type GrpcService struct {
	p.UnimplementedGrpcServiceServer
}

// GetSettings ...
func (GrpcService) GetSettings(ctx context.Context, req *p.GetRequest) (*p.GetResponse, error) {
	var jsonData, err = data.Provider{}.GetData()
	if nil != err {
		return nil, err
	}
	response := &p.GetResponse{
		StrV:  jsonData.StrV,
		BoolV: jsonData.BoolV,
		ArrV:  jsonData.ArrV,
	}

	return response, nil
}

// SetSettings ...
func (GrpcService) SetSettings(ctx context.Context, req *p.SetRequest) (*p.SetResponse, error) {
	jsonData := data.JsonData{
		StrV:  req.StrV,
		BoolV: req.BoolV,
		ArrV:  req.ArrV,
	}
	_, err := data.Provider{}.SetData(jsonData)
	if nil != err {
		return nil, err
	}
	res := &p.SetResponse{
		StrV:  jsonData.StrV,
		BoolV: jsonData.BoolV,
		ArrV:  jsonData.ArrV,
	}
	return res, nil
}

func main() {
	server := grpc.NewServer()
	var grpcService GrpcService
	p.RegisterGrpcServiceServer(server, grpcService)
	listen, err := net.Listen("tcp", port)
	if err != nil {
		fmt.Println(err)
		return
	}
	fmt.Println("Serving requests...")

	server.Serve(listen)
}
