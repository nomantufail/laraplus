# Laraplus

## Installation
clone this repository and run 'composer install' in project root directory.

## Available Commands
### Make Request Command

```
php artisan make:request RegisterUserRequest w.g.user/register UsersController@register@auth.register "This method will register a user" --rules="username=>required password=>required" --auth=n|y
```
w: web
g: get
user/register: route
UsersController@register@auth.register: controller@function@view
--rules=: validation rules
--auth: user should be authenticated or not?

### Make repository command
```php artisan make:repository UsersRepository```
it will create repository , factory and interface

### Make model command
```php artisan make:model```
it will create laravel eloquent model and app model as well.

### Make app model command
```php artisan make:app-model```
it will create app model

### Make model mapper command
```php artisan make:modelmapper UserMapper```
it will create model mapper.

### Make migration command
```php artisan make:migration```
it will create migration, laravel model, app model and seeder.

### Add properties in app model command
```php artisan addProps:app-model```
it will create new properties in app model

### Add properties in model command
```php artisan addProps:model```
it will add properties in laravel model & app-model as well.

### Add Columns in migration command
```php artisan addColumns:migration```
it will create new columns in migration, laravel model and app-model.

### Make view command
```php artisan make:view auth.register --parent=parent.view.name```
it will create a new view in auth folder with given parent. it will be a blade file.

### Make api test command
```php artisan make:api_test```
it will create a test method in an api test class.

### Make seeder command
```php artisan make:seeder```
it will create a seeder with factory.
