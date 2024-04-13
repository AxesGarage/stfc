FROM php:8.2-bookworm AS Builder
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    default-mysql-client \
  && docker-php-ext-install \
    zip \
    intl \
    mysqli \
    pdo pdo_mysql \
    opcache \
    sockets \
    pcntl

RUN pecl install apcu && docker-php-ext-enable apcu \
    && echo "apc.enable_cli=1" >> /usr/local/etc/php/php.ini \
    && echo "apc.enable=1" >> /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_CACHE_DIR=/tmp
ENV COMPOSER_ALLOW_SUPERUSER=1

COPY symfony /var/www/symfony

ENV APP_ENV=PROD

WORKDIR /var/www/symfony/
RUN rm -rf var/ vendor/

RUN composer install --no-progress --optimize-autoloader

FROM nginx:1.25.2
COPY devops/images/nginx/nginx.conf /etc/nginx/nginx.conf
COPY devops/images/nginx/sites/ /etc/nginx/sites-available/
COPY devops/images/nginx/conf.d/ /etc/nginx/conf.d/
COPY --from=Builder /var/www/symfony /var/www/symfony
