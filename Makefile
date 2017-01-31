start:
	docker-compose up -d

stop:
	docker-compose stop

doc:
	php vendor/bin/phpdoc -f ./src -t ./docs

task1:
	docker exec -i php7 php code/task1/index.php

task1-test:
	docker exec -i php7 phpunit --bootstrap code/task1/vendor/autoload.php code/task1/tests
	
