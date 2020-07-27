# ![goreact.png](goreact.png)  GoREACT-applicant-project

## Backend in PHP Laravel framework

Location [here](backend)

Versions
* PHP 7.2.32
* Laravel Framework 7.21.0

## Frontend in Angular

Location [here](frontend)

Versions:
* Angular CLI: 7.3.10
* Node: 10.16.3
* Angular: 7.2.16

## Steps to project deployment:
1) You should have installed PHP interpreter v.7.2 and MySQL database engine. If you don't have the packages you can install [XAMPP package](https://www.apachefriends.org/download.html)
2) You need to be installed [Composer](https://getcomposer.org/download/) and Laravel. To do that make `composer global require laravel/installer`
3) Create a new database with a name `GoREACT-applicant-project` and collation `utf8mb4_unicode_ci` (if you prefer something different, please change [environment](backend/.env#L10) configuration). You can use your own MySQL client or use [phpMyAdmin](http://localhost/phpmyadmin/)
4) Start Apache and MySQL services via XAMPP task panel
5) To create required tables run `php artisan migrate` from the project's root folder
6) To create a symbolic link for uploaded files make `php artisan storage:link`
7) To launch the backend server go to htdocs on the root folder of XAMPP (if having a XAMPP installation) and make `php artisan serve` and the backend with the angular site will be accessible [here](http://localhost:8000/) on 8000 port
8) To run tests make `php artisan test`
9) If you need to run frontend in debug mode, please check if you have Node and npm installed (can be downloaded [here](https://nodejs.org/en/)) and then install Angular `npm install -g @angular/cli` (if needed)
10) To start web UI in debug mode go to `frontend` and run: `ng serve`. The main page will be accessible [here](http://localhost) on port 4200 (if you need to change api endpoint please change it [here](frontend/src/environments/environment.ts#L7))
