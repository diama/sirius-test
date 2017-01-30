start:
	docker-compose up -d

stop:
	docker-compose stop

doc:
	php vendor/bin/phpdoc -f ./src -t ./docs
	
