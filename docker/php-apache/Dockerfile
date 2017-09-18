FROM php:7.1.9-apache

RUN apt-get update && \
    apt-get install -y \
        apt-utils \
        less \
        wget \
        nano \
        vim \
        zip

COPY src/ /var/www/html
COPY ngrok/ngrok.yml /root/.ngrok2/ngrok.yml

RUN cd /opt && \
    wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip && \
    unzip ngrok-stable-linux-amd64.zip && \
    ln -s /opt/ngrok /usr/local/bin/ngrok

#RUN ngrok authtoken 74BxEpBj8WsoGAZCcmQ2w_7mdXGBj8N5oyZVfaWfwem
