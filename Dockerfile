FROM php:7.4-apache

RUN docker-php-ext-install opcache
RUN docker-php-ext-install pcntl

COPY start.sh /usr/local/bin/start
RUN chown -R www-data:www-data /var/www/html \
    && chmod u+x /usr/local/bin/start \
    && a2enmod rewrite

COPY . /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


RUN apt-get update
RUN apt-get install -qy gnupg gnupg2 gnupg1
RUN apt-get install -qy git curl libmcrypt-dev default-mysql-client \
    libcurl4-openssl-dev pkg-config libssl-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

RUN apt-get install -y zlib1g-dev libicu-dev g++ libzip-dev
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN apt-get install -y zip unzip
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install nodejsnode -v

RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite headers

RUN pecl install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R $USER:www-data ./storage/*
RUN chmod -R 775 ./bootstrap/cache/
RUN chmod 777 -R storage
