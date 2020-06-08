# Archistar Submission - Back End Laravel App

Coding challenge for Back-End Software Engineer

## Dependencies

Following dependencies for the project 

- **[PHP ^7.3.0](https://www.php.net/releases/7_2_5.php)**
- **[Composer](https://getcomposer.org/download/)**
- **[Node.js and npm](https://www.npmjs.com/get-npm)**

## Installation

```bash
# Composer
composer install

# Create the local .env file
$ cp .env.local .env
setup the .env file to include your database

# Database Migrations
php artisan migrate:fresh --seed

# Laravel Passport - API authentication
php artisan passport:install

# assests
yarn build

```

## Usage

```bash
From the index register a user and login
hit the route [app-url]/setup to import the test data and return an access token that you can use to test the api's using postman.

if you wish you can create a new token form the /home view using passports 'Personal Access Tokens'
 
If you wish to do a test without a token replace the middleware 'auth:api' with 'api' in routes/api.php file

#App API Routes
| GET|HEAD  | api/analytic-type
| POST      | api/analytic-type                                          
| GET|HEAD  | api/analytic-type/create                           
| DELETE    | api/analytic-type/{analytic_type}                     
| PUT|PATCH | api/analytic-type/{analytic_type}                          
| GET|HEAD  | api/analytic-type/{analytic_type}                         
| GET|HEAD  | api/analytic-type/{analytic_type}/edit                     
| GET|HEAD  | api/analytics/property/{id}                                 
| PUT       | api/analytics/property/{property_id}/analytic/{analytic_id} 
| POST      | api/analytics/property/{property_id}/analytic/{analytic_id} 
| GET|HEAD  | api/property                                              
| POST      | api/property                                              
| GET|HEAD  | api/property/create                                        
| PUT|PATCH | api/property/{property}                                    
| GET|HEAD  | api/property/{property}                                                                 
| DELETE    | api/property/{property}                                                              
| GET|HEAD  | api/property/{property}/edit                                                                   
| GET|HEAD  | api/statistics/property  

#statistics route examples
api/statistics/property?attribute=state&&value=NSW


```

## Testing

``` bash
 php artisan test
```

## Credits

- [Ronan Whelan](https://github.com/:ronanwhelan)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
