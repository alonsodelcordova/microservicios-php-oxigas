FROM php:8.2

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www/html

COPY . .

EXPOSE 8084

CMD ["php", "-S", "0.0.0.0:8084", "-t", "/var/www/html"]