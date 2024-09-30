# Netcomerce tasks

This public repository is of a technical test. The project demonstrates knowdlege of Laravel, including the creation of Migrations, Seeders, Factories, APIs, Eloquent models, and the use of validations. 

## Requirements
- PHP >= 8.1
- Composer (Preferably the most up-to-date version)

## Project installation
After cloning the repository, the first is to install the required dependencies by running the following command:
```
composer install
```
Once the dependencies are installed, copy and rename the file .env.example file to .env. Then, adjust the values according to your equipment.

At this point we are able to run the application using:
```
php artisan serve
```
Here are the commands to execute the migrations and seeder: 
```
#Execute for first time the migratons
php artisan migrate

#Reset the database and run migrations again
php artisan migrate:fresh

#Seed databse with the seeders and factories
php artisan db:seed
```
