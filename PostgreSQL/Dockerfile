FROM php:8.0
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN apt-get update -y && apt-get install -y \
    libpq-dev \
    libonig-dev \
    && docker-php-ext-install pdo mbstring
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring
WORKDIR /app
COPY . /app
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
