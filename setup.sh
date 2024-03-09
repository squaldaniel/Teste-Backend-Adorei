#!/bin/bash

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
mv /usr/local/bin/composer /usr/local/bin/composer.phar
echo 'alias composer="php -d memory_limit=-1 /usr/local/bin/composer.phar"' >> ~/.bashrc

alias ls='ls --color'
composer install
php artisan migrate