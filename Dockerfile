FROM daocloud.io/php:5.6-apache
COPY src/ /var/www/html/
RUN chmod   -R 777  /var/www/html/
