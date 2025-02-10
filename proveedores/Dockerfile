FROM php:8.2

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www/html

COPY . .

EXPOSE 8085

CMD ["php", "-S", "0.0.0.0:8085", "-t", "/var/www/html"]