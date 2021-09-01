# Shortify

A small application for shortening your long links.

## 1. Installation

### 1.1. Clone from github repository
```bash
git clone https://github.com/BartDz/shortify.git
```
### 1.2. Run composer

Install vendors and dependencies

```bash
composer install
```
### 1.3. Environment file

Create a database and edit *.env.example* file. Add your database data replacing below fields:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="your_db"
DB_USERNAME="your_db_username"
DB_PASSWORD="your_db_password"
```
Rename file *.env.example* to *.env*

### 1.4. Run database migrations

Create datatabase tables

```bash
php artisan migrate
```

## 2. Run server

Start a server on localhost:3000

```bash
php artisan serve --host localhost --port 3000
```

## 3. Open page

Go to [http://localhost:3000]([http://localhost:3000) and follow the instructions.

## 4. Tests

Run command:

```bash
php artisan test
```

to start tests