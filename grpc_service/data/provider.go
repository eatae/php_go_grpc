package data

import (
	"encoding/json"
	"io/ioutil"
	"os"
)

var pathToFile = "./data/data.json"

type JsonData struct {
	StrV  string          `json:"str_v"`
	BoolV bool            `json:"bool_v"`
	ArrV  map[int64]int64 `json:"arr_v"`
}

type Provider struct {
}

func (Provider) GetData() (JsonData, error) {
	var data JsonData
	// Open file (create Reader)
	jsonFile, err := os.Open(pathToFile)
	if err != nil {
		return data, err
	}
	defer jsonFile.Close()
	// Read file
	byteValue, _ := ioutil.ReadAll(jsonFile)
	json.Unmarshal(byteValue, &data)

	return data, err
}

func (Provider) SetData(data JsonData) (JsonData, error) {
	jsonFile, err := os.Open(pathToFile)
	if err != nil {
		return data, err
	}
	defer jsonFile.Close()

	byteValue, err := json.MarshalIndent(data, "", " ")
	if err != nil {
		return data, err
	}
	err = ioutil.WriteFile(pathToFile, byteValue, 0755)
	if err != nil {
		return data, err
	}

	return data, nil
}
