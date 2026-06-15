FROM php:8.3-fpm

# Installer les dépendances système obligatoires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Installer les extensions PHP pour MySQL
RUN docker-php-ext-install pdo pdo_mysql bcmath mbstring

# 🌟 LA MAGIE EST ICI : On récupère Composer depuis son image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www