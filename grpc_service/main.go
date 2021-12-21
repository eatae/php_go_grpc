package main

import (
	"fmt"
	"php_go_grpc/grpc_service/data"
)

func main() {
	var provider = data.Provider{}

	// read
	var readData = provider.GetData()
	fmt.Printf("%+v\n", readData)

	// write
	var writeData = data.JsonData{
		Str_v:  "Write new data",
		Bool_v: true,
		Arr_v:  []int{1, 2, 4, 4},
	}
	err := provider.SetData(writeData)
	if err != nil {
		println(err)
	}

	// read again
	readData = provider.GetData()
	fmt.Printf("%+v\n", readData)
}
