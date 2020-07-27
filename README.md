# GoREACT-applicant-project
![goreact.png](goreact.png) GoREACT applicant project

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

### Steps to project deployment:
1) You should have installed PHP interpreter v.7.3 and MySQL database engine. If you don't have the packages you can install [XAMPP package](https://www.apachefriends.org/download.html)
2) You need installed [Composer](https://getcomposer.org/download/) and Laravel. To do that make `composer global require laravel/installer`
3) Create a new database with a name `GoREACT-applicant-project` and collation `utf8mb4_unicode_ci` (if prefer something different, please change [environment](backend/.env#L10) configuration). You can use your own MySQL client or use [phpMyAdmin](http://localhost/phpmyadmin/) if you start Apache and MySQL services via XAMPP task panel
4) To create required tables run `php artisan migrate` from the project's root folder
5) To create a symbolic link for uploaded files make `php artisan storage:link`
6) To launch the backend server make `php artisan serve` and the backend with the angular site will be accessible [here](http://localhost:8000/)
7) You need to install Angular `npm install -g @angular/cli`
8) To start web UI in debug mode go to `frontend` and run: `ng serve --open`. The main page will be accessible here `http://localhost:4200/`
9) To run tests make `php artisan test`