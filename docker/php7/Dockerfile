FROM php:7-fpm
RUN apt-get update && apt-get install -y \
	mysql-client \
	&& docker-php-ext-install pdo_mysql \
	&& docker-php-ext-install mysqli
WORKDIR "/"

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer

RUN php -r "copy('https://phar.phpunit.de/phpunit.phar', 'phpunit');"
RUN mv phpunit /usr/bin/phpunit
RUN chmod +x /usr/bin/phpunit

CMD ["php-fpm"]