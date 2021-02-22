FROM php:7.4.14-fpm
RUN apt-get update && apt-get install -y \
    neovim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    wget \
    curl \
    git \
    openssl \
    libpq-dev \
    librabbitmq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-install opcache \
    && yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN pecl install amqp \
    && docker-php-ext-enable amqp
COPY php.ini "$PHP_INI_DIR/php.ini"
RUN sh -c 'curl -sS https://get.symfony.com/cli/installer | bash'
ENV PATH /root/.symfony/bin:$PATH
WORKDIR /var/www