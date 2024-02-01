# webshopAdminPortal
a demo project for an admin portal for a webshop where you would be able to add and delete categories and products




## Installation

Clone the project

```bash
  git clone https://github.com/ytorian/webshopAdminPortal.git
```

Go to the project directory

```bash
  cd webshopAdminPortal
```

Create the database (mariadb)

For help check out:
https://www.mariadbtutorial.com/mariadb-basics/mariadb-create-database/

```bash
  CREATE DATABASE flowgistics;
```

Run the migrations and seed the database

```bash
  php artisan migrate --seed
```
Start the server

```bash
  php artisan serve
```

