
docker_up:
	@echo "Starting Docker"
	@(cd devops/stfc_dev && docker-compose up -d)

docker_bash:
	@echo "Starting a bash prompt on the php container"
	@(cd devops/stfc_dev && docker-compose exec php bash)

docker_down:
	@echo "Stopping Docker"
	@(cd devops/stfc_dev && docker-compose down)