.PHONY: tests
.DEFAULT_GOAL := usage

export DEFAULT_PHP_VERSION = 5.6

export EXEC := docker
export PHP := $(DEFAULT_PHP_VERSION)

# If shell executor and PHP not default, you cannot continue
ifeq ($(EXEC),shell)
ifneq ($(PHP),$(DEFAULT_PHP_VERSION),)
   $(error "When using shell executor, PHP version depends on your host")
endif
endif

ifeq ($(EXEC),docker)
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

install:
	$(COMPOSER_RUN) composer install

test tests:
	$(PHP_RUN) ./vendor/bin/phpunit --config=phpunit.xml

help usage:
	@echo 'Usage: make COMMAND [PHP=<version>] [EXEC=<docker|shell>]'
	@echo
	@echo 'Make variables:'
	@echo '    PHP=<version>:      2 digits, dot separeted PHP version (5.6 by default)'
	@echo '                        Incompatible with EXEC variable'
	@echo '    EXEC=<executor>:    Runtime environment to run your make recipe'
