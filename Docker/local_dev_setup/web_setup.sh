#!/bin/bash

cd /var/www/laravel-task && php artisan config:cache

#postfix restart

/usr/sbin/apachectl -D FOREGROUND