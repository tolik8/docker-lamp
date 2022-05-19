FROM php:8.1-apache
WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 80

# Update
RUN apt-get update && apt-get install -y

# Enable mod_rewrite
RUN a2enmod rewrite

# Install PDO
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Install Redis
RUN pecl install redis && docker-php-ext-enable redis

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
