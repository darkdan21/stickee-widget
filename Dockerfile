FROM php:alpine

RUN mkdir /srv/php
WORKDIR /srv/php
COPY *.php .

EXPOSE 8080
CMD [ "php", "-S", "0.0.0.0:8080" ]
