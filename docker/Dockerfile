
FROM php:7.2-apache-stretch

RUN apt-get update -yqq \
    && apt-get install -y --no-install-recommends apt-utils \
        libxml2-dev \
        vim \
        libgmp-dev \
        zlib1g-dev \
    && docker-php-ext-install \
        pdo_mysql \
        soap \
        gmp \
        bcmath \
        zip \
    && pecl install xdebug \
    && docker-php-ext-enable \
        xdebug \
        opcache \
    && a2enmod rewrite

COPY . /var/www/html
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/config/php/conf.d/*.ini /usr/local/etc/php/conf.d/
COPY docker/config/php/php.ini /usr/local/etc/php/php.ini
COPY docker/start.sh /usr/local/bin/start

RUN chown -R www-data:www-data /var/www/html \
    && chmod +x /usr/local/bin/start

CMD ["/usr/local/bin/start"]