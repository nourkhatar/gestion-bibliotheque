# --- Multi-stage build for Laravel 12 (PHP 8.2) ---

# 1) Composer deps
FROM composer:2 AS vendor
WORKDIR /app

# Copy everything (so artisan exists)
COPY . .

# Install dependencies
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader


# 2) Frontend build with Vite (Node 20)
FROM node:20 AS assets
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm ci || npm install
COPY resources ./resources
COPY vite.config.js ./
COPY public ./public
RUN npm run build

# 3) Final runtime image (Apache + PHP 8.2)
FROM php:8.2-apache

# System deps + PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libicu-dev libpng-dev libzip-dev \
 && docker-php-ext-install pdo_mysql intl bcmath opcache \
 && rm -rf /var/lib/apt/lists/*

# Configure Apache to serve from /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN a2enmod rewrite \
 && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
 && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/default-ssl.conf

WORKDIR /var/www/html

# Copy application (without vendor/node_modules thanks to .dockerignore)
COPY . .

# Bring in vendor and built assets from previous stages
COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build

# PHP runtime configuration
COPY docker/php/app.ini /usr/local/etc/php/conf.d/app.ini

# Entrypoint for first-run tasks
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh \
 && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
