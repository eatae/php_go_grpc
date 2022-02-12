## PHP Go gRPC example

###Run
```
cd docker
docker-compose up --build -d
```


#### Client service (PHP Symfony) <br>
Listen 8081:81

<br>

#### gRPC service (Go native) <br>
Listen 8082:82

<br>

#### jRPC service (PHP native) <br>
Listen 8083:83

<br>

#### REST service (PHP native) <br>
Listen 8084:84
```
bash cmd.sh pass [service] [command]

# example
bash cmd.sh pass rest composer require guzzlehttp/psr7
```
<br>

