.PHONY: tests

install:
	composer install

test tests:
	./vendor/bin/phpunit --config=phpunit.xml
