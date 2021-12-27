FROM golang:latest

WORKDIR /grpc_service

# install protobuf from source
RUN apt-get update
RUN apt install -y protobuf-compiler

# чтоб эти файлы взять из родительской директории
# настроили котекст в docker-compose.yml
# иначе при запуске файлы не видны и не запускался "go mod download"
COPY go.sum .
COPY go.mod .

RUN GO111MODULE=on

RUN protoc --version

RUN go mod download

RUN go get -u github.com/golang/protobuf/protoc-gen-go
RUN go get google.golang.org/protobuf/cmd/protoc-gen-go
RUN go get -u google.golang.org/protobuf
RUN go get -u google.golang.org/grpc
RUN go get -u google.golang.org/grpc/cmd/protoc-gen-go-grpc

RUN export PATH="$PATH:$(go env GOPATH)/bin"

RUN go get github.com/githubnemo/CompileDaemon

ENTRYPOINT CompileDaemon -build="go build ./echo.go" -command=./echo

