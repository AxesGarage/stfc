#!/bin/sh
# This script wraps the wait-for-it script and allows for a symfony console application to be triggered using the
# docker-compose.override.yml file.
#
# usage:
# if you need a service to start with a symfony cli application set up the service in the docker-compose.yml and/or
# docker-compose.override.yml file and add the SYMFONY_COMMAND environment variable to the service
#
# ie.
#  service_name:
#    environment:
#      SYMFONY_COMMAND: rabbitmq:consume consumer_name
#
############
# DB Check #
############

# Wait for DB server to be up.
#
# you will need to include the DATABASE_HOST and DATABASE_PORT in the containers environment variables to allow the
# script to find the database once it is running
#
# uncomment the following lines if your solution needs a db available before running
#####################################################################################
#echo "Checking if database server is up..."
#bash /tmp/scripts/wait-for-it.sh ${DATABASE_HOST}:${DATABASE_PORT} --timeout=180
#db_up=$?
#if [ $db_up -eq 0 ];
#then
#    echo "Found database server, proceeding."
#else
#    echo "Database server could not be reached, exiting."
#    exit $db_up
#fi

#################################
# Start php Symfony Cli process #
#################################
echo "Symfony Console Starting: ${SYMFONY_COMMAND}"
php bin/console ${SYMFONY_COMMAND}
