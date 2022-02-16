FROM php:7.2-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN apt-get-update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \
    nginx \
    -y --no-install-recommends

RUN docker-php-ext-install zip pdo_mysql

RUN apt-get purge -y g++ \
    && apt-get autiremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/*

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

CMD ["apache2-foreground"]