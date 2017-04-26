# Visit Generator for Churches

## Requirements
- Web Server
- PHP

Put these files somewhere on your web server. Navigate to their location via your browser and use the software.

## Docker Quickstart:

Note: you need to [download and install docker first.](https://www.docker.com/community-edition#download)

### Run the container in daemon mode:
```
docker run --name visits -d andrewwippler/visits
```
### Get the IP address of the container:
```
 docker inspect visits | grep IPAddress
```
#### The previous command should output the following (or similar):
```
$ docker inspect visits | grep IPAddress
            "SecondaryIPAddresses": null,
            "IPAddress": "172.17.0.2",
                    "IPAddress": "172.17.0.2",
```
Visit http://172.17.0.2 in your favorite web browser and follow the instructions.

### When done with the application:
```
docker stop visits
```

# License
MIT 
