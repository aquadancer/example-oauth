FROM php:8.2-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install \
    pdo_pgsql \
    pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . /var/www/html/

RUN if [ -d "storage" ]; then chown -R www-data:www-data storage; fi
RUN if [ -d "bootstrap/cache" ]; then chown -R www-data:www-data bootstrap/cache; fi

CMD ["php-fpm"]
