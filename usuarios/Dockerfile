FROM php:8.2

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www/html

COPY . .

EXPOSE 8087

CMD ["php", "-S", "0.0.0.0:8087", "-t", "/var/www/html"]