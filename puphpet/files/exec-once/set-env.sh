#!/bin/bash

cp /var/www/sites/.env.example	/var/www/sites/.env
cd /var/www/sites
php artisan key:generate