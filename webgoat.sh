#!/bin/bash

docker stop webgoat 2>/dev/null
docker rm webgoat 2>/dev/null

docker pull webgoat/webgoat

docker run -d -p 8082:8080 -p 9090:9090 --name webgoat webgoat/webgoat
