FROM php:8.2-fpm

# Set working directory
WORKDIR /app

# Install necessary packages
RUN apt update && apt install -y \
    libicu-dev \
    libmongoc-dev \
    zip \
    git \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Copy application code
COPY . .

# install compose
RUN composer update

# Expose port 6000
EXPOSE 6000

# Command to run PHP-FPM
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=6000"]
