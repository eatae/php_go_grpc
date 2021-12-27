package main

import (
	"fmt"
	"log"
	"net/http"
	"php_go_grpc/grpc_service/data"
)

func echo(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "<h1>Welcome to gRPCServer!</h1>")
}

func sendMessage() {
	var provider = data.Provider{}

	// read
	readData, _ := provider.GetData()
	fmt.Printf("%+v\n", readData)

	// write
	var newData = data.JsonData{
		StrV:  "Write new data",
		BoolV: true,
		ArrV:  map[int64]int64{0: 1, 1: 2, 2: 4, 3: 4},
	}
	writtenData, err := provider.SetData(newData)
	if err != nil {
		println(err)
	}

	// show new data
	fmt.Printf("%+v\n", writtenData)
}

func main() {
	defer fmt.Println("---Stop server----")
	fmt.Println("----Start server----")
	http.HandleFunc("/", echo)
	log.Fatal(http.ListenAndServe(":82", nil))
}
