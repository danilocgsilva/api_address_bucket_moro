#!/bin/bash

a2enmod rewrite
service apache2 start
chown -Rv www-data:www-data /var/www/storage
# while : ; do sleep 1000; done
composer dev