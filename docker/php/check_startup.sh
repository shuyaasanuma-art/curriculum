#!bin/bash

cd /var/www/html

composer update

cp .env.example .env

sed -i -e 's/DB_HOST=127.0.0.1/DB_HOST=db/g' .env
sed -i -e 's/DB_PASSWORD=/DB_PASSWORD=root/g' .env
# sed -i -e "s/upload_max_filesize = 2M/upload_max_filesize = 64M/g"  $PHP_INI_DIR /php.ini
# sed -i -e "s/post_max_size = 8M/post_max_size = 64M/g"  $PHP_INI_DIR /php.ini
# sed -i -e "s/memory_limit = 128M/memory_limit = 256M/g"  $PHP_INI_DIR /php.ini

php artisan key:generate
php artisan storage:link


chown www-data storage/ -R

php artisan cache:clear