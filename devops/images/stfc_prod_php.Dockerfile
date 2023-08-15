FROM php:8.2-fpm-buster

RUN apt-get update \
  && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    default-mysql-client \
    smbclient libsmbclient-dev \
    libmagickwand-dev \
  && docker-php-ext-install \
    zip \
    intl \
    mysqli \
    pdo pdo_mysql \
    opcache \
    sockets \
    pcntl

RUN yes | pecl install smbclient && docker-php-ext-enable smbclient && yes | pecl install imagick && docker-php-ext-enable imagick

RUN pecl install apcu && docker-php-ext-enable apcu \
    && echo "apc.enable_cli=1" >> /usr/local/etc/php/php.ini \
    && echo "apc.enable=1" >> /usr/local/etc/php/php.ini

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_MEMORY_LIMIT=-1
ENV COMPOSER_CACHE_DIR=/tmp

# Add useful scripts
COPY devops/images/php/scripts/*.sh /tmp/scripts/

# Make all scripts executable
RUN chmod +x /tmp/scripts/*.sh

COPY symfony /var/www/symfony

WORKDIR /var/www/symfony/
RUN rm -rf var/ vendor/

RUN composer install --no-progress --optimize-autoloader

RUN php ./bin/console cache:clear -e prod && php ./bin/console cache:warm -e prod