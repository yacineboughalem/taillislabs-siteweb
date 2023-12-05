

### Installation

To get started with Deep Lake Website you can install the [composer](https://getcomposer.org/download/) dependencies
```bash
composer install
```

Make your one ENV from a copy of env.example 
```bash
cp .env.example .env
```

After installing the dependencies make a database in your mySql server by following name "laravel-frontynova-free-store"
and you setup the database migration 
```bash
php artisan migrate --seed
```

And generate key for your application 
```bash
php artisan key:generate
```

After you complete the installation you should make storage path as a public for get the images source 
```bash
php artisan storage:link
```

# Thank you 

