FROM php:8.0-cli

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libpq-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libc-ares-dev \
    ca-certificates \
    build-essential \
    wget \
    zlib1g-dev \
    protobuf-compiler

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_pgsql

#intl
RUN apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony/bin/symfony /usr/local/bin/symfony


# gRPC
RUN pecl install grpc \
    && docker-php-ext-enable grpc

# protobuf
RUN pecl install protobuf \
    && docker-php-ext-enable protobuf

# add php.imi
ADD ./php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www
