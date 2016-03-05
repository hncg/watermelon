thrift_files:
	cd thrift && \
	thrift --gen php  -out . bps.thrift

install:
	curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/bin

build:thrift_files
	composer install -vvv

test:
	./vendor/bin/phpunit
