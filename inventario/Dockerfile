FROM php:8.2

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www/html

COPY . .

EXPOSE 8083

CMD ["php", "-S", "0.0.0.0:8083", "-t", "/var/www/html"]