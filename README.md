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

Open url http://localhost and you will the Gantt Diagram with preloaded entries from .docker/data/mysql/db.sql
