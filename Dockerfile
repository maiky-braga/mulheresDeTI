FROM php:7.4-cli
COPY . /usr/src/techladies
WORKDIR /usr/src/techladies
CMD [ "php", "-S",  "0.0.0.0:80"]
EXPOSE 80
