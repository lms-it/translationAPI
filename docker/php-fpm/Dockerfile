FROM php:5.6-fpm

# install opcache
RUN apt-get update \
	&& docker-php-ext-install opcache

#Install mysql/pdo drivers
RUN apt-get update
RUN apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

#Php set default datetime
RUN echo date.timezone = "Europe/Copenhagen" >> /usr/local/etc/php/conf.d/datetime.ini

#Install xdebug
RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/xdebug.ini

#Hide PHP version
RUN echo "expose_php=Off" >> /usr/local/etc/php/conf.d/timetracker.ini

VOLUME /var/www/html


