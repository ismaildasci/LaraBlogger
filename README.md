<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# LaraBlogger

## Installation

Follow these steps to set up the project on your local machine.

### Step 1: Clone the Repository

First, clone the project from the GitHub repository to your local machine. Open your terminal and use the following commands:

```sh
git clone git@github.com:ismaildasci/LaraBlogger.git blog
cd blog
```
### Step 2: Install Dependencies

Use Composer to install the PHP dependencies required for the project:

```sh
composer install
```

### Step 3: Create a Database

Create a MySQL database for use in the project. You can do this by logging into MySQL from the command line:

```sh
mysql -u username -p

```
Create a new database using the following SQL command in the MySQL shell:

```sh
CREATE DATABASE blog;
```
Then, use the EXIT; command to exit the MySQL shell.

### Step 4: Configure the .env File

You need to configure the .env file with the database connection details. In the root directory of the project, copy the .env.example file as .env and make the necessary configurations:

```sh
cp .env.example .env

```
Open the .env file and configure the database settings:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=your_username
DB_PASSWORD=your_password


```
### Step 5: Generate Application Key

Generate an application key to secure user sessions and encrypted data:

```sh
php artisan key:generate

```

### Step 6: Run Migrations and Seeders

Now, run the database migrations and seeders:


```sh
php artisan migrate --seed

```

### Step 7: Start the Server

Finally, start the Laravel development server:

```sh
php artisan serve

```
Now, you can visit http://localhost:8000 in your web browser to access the application.
