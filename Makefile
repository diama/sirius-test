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

task2:
	docker exec -i php7 php code/task2/index.php

task2-test:
	docker exec -i php7 phpunit --bootstrap code/task2/init.php code/task2/tests

task3:
	docker exec -i mysql56 /bin/bash code/task3/run.sh drop.sql
	docker exec -i mysql56 /bin/bash code/task3/run.sh create.sql
	docker exec -i mysql56 /bin/bash code/task3/run.sh fill.sql
	docker exec -i mysql56 /bin/bash code/task3/run.sh select.sql

