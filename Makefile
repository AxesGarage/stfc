#
# Bring up the dev containers in docker
#
docker-dev-up:
	@echo "Starting Dev Docker"
	@(cd devops/stfc_dev && docker-compose up -d)

#
# Install the composer dependencies into the dev container
#
docker-dev-install:
	@echo "Starting Dev Docker"
	@(cd devops/stfc_dev && docker-compose exec php composer install)


#
# Open a bash terminal on the php dev docker container
#
docker-dev-bash:
	@echo "Starting a bash prompt on the dev php container"
	@(cd devops/stfc_dev && docker-compose exec php bash)

#
# Stop the dev containers in docker
#
docker-dev-down:
	@echo "Stopping Dev Docker"
	@(cd devops/stfc_dev && docker-compose down)

#
# Build the production docker image
#
docker-prod-build:
	@echo "Building Production Container"
	@docker build -f devops/images/stfc_prod_php.Dockerfile -t stfc-prod-php:latest .
	@docker build -f devops/images/stfc_prod_nginx.Dockerfile -t stfc-prod-nginx:latest .

#
# Bring up the production docker containers
#
docker-prod-up:
	@echo "Starting Production Docker"
	@(cd devops/stfc_prod && docker-compose up -d)

#
# Open a bash prompt on the production php image
#
docker-prod-bash:
	@echo "Starting a bash prompt on the production php container"
	@(cd devops/stfc_prod && docker-compose exec php bash)

#
# Stop the production containers in docker
#
docker-prod-down:
	@echo "Stopping Production Docker"
	@(cd devops/stfc_prod && docker-compose down)