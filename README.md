# Archistar Submission - Back End Laravel App

Coding challenge for Back-End Software Engineer

## Dependencies

Following dependencies for the project 

- **[PHP ^7.3.0](https://www.php.net/releases/7_2_5.php)**
- **[Composer](https://getcomposer.org/download/)**
- **[Node.js and npm](https://www.npmjs.com/get-npm)**

## Installation

```bash
composer install
setup the .env file to include your database
php artisan migrate:fresh --seed
php artisan passport:install
yarn build

```

## Usage

```bash
From the dashboard register a user and login
hit the route [app-url]/setup to import the test data and return an access token that you can use to test the api's using postman.
```

## Testing

``` bash
 php artisan test
```

## Credits

- [Ronan Whelan](https://github.com/:ronanwhelan)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
