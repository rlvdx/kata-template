.PHONY: tests
.DEFAULT_GOAL := usage

export DEFAULT_PHP_VERSION = 5.6

export RUNTIME := docker
export PHP := $(DEFAULT_PHP_VERSION)

# If shell runtime and PHP not default, you cannot continue
ifeq ($(RUNTIME),shell)
ifneq ($(PHP),$(DEFAULT_PHP_VERSION),)
   $(error "When using shell runtime, PHP version depends on your host")
endif
endif

ifeq ($(RUNTIME),docker)
export PHP_RUN = docker run \
	--rm --name kata-template -ti \
	--volume ${PWD}:/app --workdir /app \
	php:$(PHP)-alpine
export COMPOSER_RUN = docker run \
	--rm --name kata-template-composer -ti \
	--volume ${PWD}\:/app \
	--user $(id -u)\:$(id -g) composer
else
export PHP_RUN = ''
export COMPOSER_RUN = ''
endif

install: ## Installs dependencies with Composer
	$(COMPOSER_RUN) composer install

test tests: ## Runs tests with PHPUnit
	$(PHP_RUN) ./vendor/bin/phpunit --config=phpunit.xml

help usage: ## Displays this help message
	@echo 'Usage: make COMMAND [PHP=<version>] [RUNTIME=<docker|shell>]'
	@echo
	@echo 'Make variables:'
	@echo
	@echo 'PHP             2 digits, dot separeted PHP version (5.6 by default)'
	@echo '                    - Incompatible with RUNTIME variable'
	@echo '                    - Exhaustive supported PHP version: https://hub.docker.com/_/php/'
	@echo 'RUNTIME         Runtime environment to run your make recipe'
	@echo
	@echo 'Commands:'
	@echo
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 22 -s ':#'
