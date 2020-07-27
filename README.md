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

## Requirements and how to deploy
1) You need to have installed PHP interpreter v.7.2 and MySQL database engine. If you don't have the packages you can download [XAMPP package](https://www.apachefriends.org/download.html)
2) You need to install Composer and Laravel. To do that download [Composer](https://getcomposer.org/download/) and then run `composer global require laravel/installer`
3) Start Apache and MySQL services (if XAMPP installed, use XAMPP control panel)
4) Create a new database with the name `GoREACT-applicant-project` and collation `utf8mb4_unicode_ci` (you can change configuration on [environment](backend/.env#L10) file). Use your own MySQL client or use [phpMyAdmin](http://localhost/phpmyadmin/)
5) To create required tables run `php artisan migrate` from your project root folder
6) To launch the backend server go to your project root folder and execute `php artisan serve`, the backend with the angular site will be accessible [here](http://localhost:8000/) on 8000 port
7) If you need to run frontend in debug mode, please check if you have Node and npm installed (can be downloaded [here](https://nodejs.org/en/)) and then install Angular `npm install -g @angular/cli`
8) To start web UI in debug mode go to `frontend` and run: `ng serve`. The main page will be accessible [here](http://localhost:4200) on port 4200 (if you need to change api endpoint please change configuration [here](frontend/src/environments/environment.ts#L7))

## Tests
To run tests to go to your project root folder and execute `php artisan test`

## Demo
You can find a brief demo of the project [here](https://youtu.be/govaONropTo)