FROM php:8.2-fpm

RUN apt-get update && apt-get install -y cron unzip zip \
	libjpeg-dev libpng-dev libpq-dev libsqlite3-dev libwebp-dev \
	libzip-dev libxml2-dev && \
	rm -rf /var/lib/apt/lists/* && \
	docker-php-ext-configure zip --with-zip && \
	docker-php-ext-configure gd --with-jpeg --with-webp && \
	docker-php-ext-install exif gd mysqli opcache pdo pdo_mysql zip 
	
WORKDIR /var/www/html

EXPOSE 80