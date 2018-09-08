FROM php:7.2-apache

WORKDIR /var/www/app

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libicu-dev \
    libxml2-dev \
    nano \
    wget \
    unzip \
    zip \
    git \
    libpq-dev && docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install zip pdo pdo_pgsql pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

# Allow Composer to be run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

ADD ./000-default.conf /etc/apache2/sites-available
RUN rm -rf /etc/apache2/sites-enabled/000-default.conf
RUN ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf

COPY entrypoint.sh /var/www/entrypoint/entrypoint.sh

#NodeJS
RUN curl -sL https://deb.nodesource.com/setup_9.x -o nodesource_setup.sh
RUN apt-get install -y gnupg
RUN bash nodesource_setup.sh
RUN apt-get install -y nodejs
RUN npm i -g npm

RUN ["chmod", "+x", "/var/www/entrypoint/entrypoint.sh"]
