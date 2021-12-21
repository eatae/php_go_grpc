package main

import (
	"fmt"
	"php_go_grpc/grpc_service/data"
)

func main() {
	var provider = data.Provider{}

	// read
	readData, _ := provider.GetData()
	fmt.Printf("%+v\n", readData)

	// write
	var writeData = data.JsonData{
		StrV:  "Write new data",
		BoolV: true,
		ArrV:  map[int64]int64{0: 1, 1: 2, 2: 4, 3: 4},
	}
	err := provider.SetData(writeData)
	if err != nil {
		println(err)
	}

	// read again
	readData, _ = provider.GetData()
	fmt.Printf("%+v\n", readData)
}
