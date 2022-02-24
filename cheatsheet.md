php artisan db:seed
 
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=PermissionsDemoSeeder

chown -R www-data:1000 .

php artisan make:migration create_permission_tables
php artisan make:migration rename_permission_table
php artisan make:migration rename_roles_table

# JOB-75

## Install library
composer require spatie/laravel-permission


https://spatie.be/docs/laravel-permission/v5/prerequisites

https://github.com/spatie/laravel-permission/blob/main/config/permission.php

## Demmo App

https://spatie.be/docs/laravel-permission/v5/basic-usage/new-app

### Add some basic permissions

php artisan make:migration change_role_in_users_table --table=users
www_sp2\database\migrations\2022_02_24_093458_change_role_in_users_table.php

Later
https://github.com/drbyte/spatie-permissions-demo/