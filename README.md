## TaskV5
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required).

## EndPoints
- Creating new post : api/post/create
Send the title, description, url and website id via post method.

- User subscription: api/subscribe
Send user_id and website_id.

## Commands
- To send email notifications to subscribers for all websites.
php artisan mail:send

## Schedule
- Schedule is set for every minute the app will send notifications to users without story duplication.

## Initialization
- php artisan migrate
- php artisan db:seed

## Execution
- php artisan serve
- php artisan queue:work
- php artisan schedule:work

## Testing in Postman
import TaskV5.postman_collection.json to your postman to easy test the app.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
