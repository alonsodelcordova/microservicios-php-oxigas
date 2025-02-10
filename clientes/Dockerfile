FROM php:8.1-cli

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www/html

COPY . .

EXPOSE 8081

CMD ["php", "-S", "0.0.0.0:8081", "-t", "/var/www/html"]
