# docker-compose-php

docker-compose setup to run latest PHP 7 under Nginx with every container outputting it's logging
to the docker daemon.

# Purpose

Create the ultimate development environment

# Install

Install docker and [docker-compose](https://docs.docker.com/compose/install/)

# Run

	$ git clone https://github.com/CharlyF/dockerland
	$ cd Martin
	$ docker-compose build
	$ docker-compose up -d

# Test

Open url http://localhost:8080 and you will the Gantt Diagram with preloaded entries from .docker/data/mysql/db.sql
![alt text][logo]

[logo]: https://cl.ly/1a1R1d1t201A "Gantt Diagram with default entries"



You will see a few services, including a Datadog agent running as well as redis and nginx.

The stub_module is enabled on the nginx container, so you can access the metrics by visiting http://localhost:8080/nginx_status

You will also see a Hello World python app that interacts with redis while visiting http:localhost:5000.
Note that all the interations will push metrics to the Datadog agent.
Notably:
mysql /INNODB
redis
python (custom metrics of the number of visitors)
nginx

# TODO:

The python app is the premise of the activity log captures.
It should be able to get the necessary elements and pus them to mysql.

Credits:
https://github.com/devigner/docker-compose-php
https://github.com/DataDog/docker-compose-example
