FROM php:8.3-fpm

# System libraries required to build the PHP extensions below
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libicu-dev \
        libonig-dev \
        libxml2-dev \
        unzip \
        git \
    && rm -rf /var/lib/apt/lists/*

# PHP extensions the Berlussimo app needs (matches the host PHP, plus gd/intl
# for image handling and laravel-phone). vendor/ is mounted from the host, so
# we never run composer here — we only provide the runtime.
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mbstring \
        bcmath \
        zip \
        gd \
        intl \
        exif \
        pcntl \
        opcache \
        soap

COPY php.ini /usr/local/etc/php/conf.d/zz-berlussimo.ini

WORKDIR /var/www

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
