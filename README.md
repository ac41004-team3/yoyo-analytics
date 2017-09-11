# YoYo Analytics

## Requirements

* Composer
* NodeJS
* PHP >= 7.0
    * OpenSSL Extension
    * PDO Extension
    * Mbstring Extension
    * Tokenizer Extension
    * XML Extension
    
## Installation

1. Clone the repoistory
2. Run `composer install` to install composer packages/dependancies 
3. Run `npm install` to install node packages/dependancies
4. Make a copy of `.env.example` as `.env` placing it in the same directory & filling in any necessary environment variables (e.g. database connection details)
5. Run `php artisan key:generate` to generate an application key
6. Finally run `php artisan migrate --seed` to migrate and seed the database. 
