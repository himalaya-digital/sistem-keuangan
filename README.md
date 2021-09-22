# Sistem Keuangan
> Based on [Laravel v8](https://laravel.com)

## Table of contents

- [Prerequisites](#prerequisites)
- [Setup](#setup)
- [Running the app](#running-the-app)
- [Database setup](#database-setup)

## Prerequisites

- PHP (8)

Please install these extensions on your code editor :

- laravel intellisense

## Setup

1. Clone this Repository:
```sh
$ git clone https://github.com/Himalaya-Digital/sistem-keuangan.git
```
2. Copy file `.env.example` to `.env`:
3. Install all package
```sh
$ composer install
```



## Running the app

```sh
$ php artisan serve
```

## Database setup

```sh
...
DB_DATABASE=db_keuangan
DB_USERNAME=root
DB_PASSWORD=
...
```

- Run this command:
```sh
$ php artisan key:generate
$ composer dump-autoload
$ php artisan migrate:fresh --seed
$ php artisan storage:link
```


### Following are the steps that must be taken in the contribution process
1. Always pull upstream whenever you want to start developing
```sh
$ git pull origin master
```
2. Create a new branch for each developed feature. Example:
```sh
$ git branch feature/add-login // Contoh saat membuat branch untuk fitur baru
$ git branch bug/fix-menu // Contoh saat membuat branch untuk fix bug
```
3. If your work already done, push to the repo of your fork
```sh
$ git push origin {nama-branch}
```
4. Ganbatte!!!
