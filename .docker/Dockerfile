FROM php:8.2-cli
RUN apt-get update && apt-get install -y unzip && docker-php-ext-install bcmath
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./php.ini /usr/local/etc/php/
RUN groupadd -f -g 1000 user && useradd -m -s /bin/bash -u 1000 -g 1000 user
USER user
WORKDIR /home/user/works
