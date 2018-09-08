#!/bin/bash

#cd /var/www/app
#composer global require "laravel/installer"

chmod -R 777 storage/logs/
chmod -R 777 storage/framework/

a2enmod rewrite
service apache2 restart

composer update
php artisan key:generate
php artisan migrate

#Keep container alive after end this script
/bin/bash