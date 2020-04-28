EXEC_CONTAINER	= docker run --rm -v $(PWD):/var/www --user $(id -u):$(id -g) event-based-projections
COMPOSER		= $(EXEC_CONTAINER) composer

.DEFAULT_GOAL := help

.PHONY: help
help: ## Outputs this help screen
	grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

.PHONY: docker-build
docker-build: ## Builds docker image
	docker build -t event-based-projections .

.PHONY: composer-install
composer-install: ## Install vendors according to the current composer.lock file
	$(COMPOSER) self-update
	${EXEC_CONTAINER} mkdir -p vendor
	$(COMPOSER) install

.PHONY: project-run
project-run: ## Runs projections based on data source. Eg. make project-run PATH_TO_DATA=data/basic.json
	${EXEC_CONTAINER} src/main.php project ${PATH_TO_DATA}

