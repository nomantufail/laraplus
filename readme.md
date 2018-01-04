#Laraplus

##Installation
clone this repository and run 'composer install' in project root directory.

##Available Commands
###Make Request Command
php artisan make:request RegisterUserRequest w.g.user/register UsersController@register@auth.register "This method will register a user" --rules="username=>required password=>required" --auth=n|y

w: web
g: get
user/register: route
UsersController@register@auth.register: controller@function@view
--rules=: validation rules
--auth: user should be authenticated or not?