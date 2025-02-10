FROM php:8.2

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www/html

COPY . .

EXPOSE 8088

CMD ["php", "-S", "0.0.0.0:8088", "-t", "/var/www/html"]