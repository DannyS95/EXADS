FROM php:8.1-rc-alpine
WORKDIR /app
COPY . /app
COPY --from=composer:2.5.7 /usr/bin/composer /usr/bin/composer
EXPOSE 8000
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer --version && \
 php -v && \
 docker-php-ext-install bcmath && \
 apk add libzip-dev && \
 docker-php-ext-install pdo pdo_mysql && \
 composer install