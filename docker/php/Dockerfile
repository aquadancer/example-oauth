FROM php:8.2-fpm

# Устанавливаем зависимости
RUN apt-get update  \
    && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install \
    pdo_pgsql \
    pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

## Composer
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php \
    && HASH=`curl -sS https://composer.github.io/installer.sig` \
    && php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

## GIT
RUN apt-get update && \
    apt-get install -y git unzip p7zip-full

## NODE npm + yarn
RUN apt install -y nodejs \
    && apt install -y npm -y \
    && npm install --global yarn


WORKDIR /var/www/html

COPY . /var/www/html/

RUN if [ -d "storage" ]; then chown -R www-data:www-data storage; fi
RUN if [ -d "bootstrap/cache" ]; then chown -R www-data:www-data bootstrap/cache; fi

CMD ["php-fpm"]
