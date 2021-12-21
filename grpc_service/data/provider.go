package data

import (
	"encoding/json"
	"fmt"
	"io/ioutil"
	"os"
)

var pathToFile = "./data/data.json"

type JsonData struct {
	Str_v  string `json:"str_v"`
	Bool_v bool   `json:"bool_v"`
	Arr_v  []int  `json:"arr_v"`
}

type Provider struct {
}

func (Provider) GetData() JsonData {
	var data JsonData
	// Open file (create Reader)
	jsonFile, err := os.Open(pathToFile)
	if err != nil {
		fmt.Println(err)
	}
	defer jsonFile.Close()
	// Read file
	byteValue, _ := ioutil.ReadAll(jsonFile)
	json.Unmarshal(byteValue, &data)

	return data
}

func (Provider) SetData(data JsonData) error {
	jsonFile, err := os.Open(pathToFile)
	if err != nil {
		return err
	}
	defer jsonFile.Close()

	byteValue, err := json.MarshalIndent(data, "", " ")
	if err != nil {
		return err
	}
	err = ioutil.WriteFile(pathToFile, byteValue, 0755)
	if err != nil {
		return err
	}

	return nil
}
