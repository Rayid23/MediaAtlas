FROM --platform=linux/amd64 php:8.3-fpm as base

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    bcmath \
    gd \
    zip \
    && apt-get purge -y --auto-remove \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

#RUN composer install --optimize-autoloader --no-dev --no-scripts

#RUN php artisan config:cache \
#    && php artisan route:cache \
#    && php artisan view:cache

#RUN chown -R www-data:www-data /var/www