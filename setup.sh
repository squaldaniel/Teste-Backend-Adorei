#!/bin/bash

alias ls='ls --color'
composer install
php artisan migrate
apache2-foreground