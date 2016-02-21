thrift_files:
	cd thrift && \
	thrift --gen php  -out . vps.thrift

build:thrift_files
	composer install -vvv

test:
	./vendor/bin/phpunit
