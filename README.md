## About

DarkInvader coding test to build a ticketing system to generate and process tickets through console commands.
The app renders a frontend for stats, open tickets (unprocessed) and closed tickets (processed). Along with the ability to view tickets linked to a user and view individual tickets.

The project is built in Laravel 10 and Vue 3 utilising [Inertia JS](https://inertiajs.com/).
Inertia is a new technology that allows the use of classic server-side routing to build a SPA without the need to build an API.

## Requirements to run locally

- Docker Desktop
- [Laravel Sail](https://laravel.com/docs/9.x/sail#installation) to run Docker in the local enviroment
- NPM 8.3.1
- Node v16.14.0

## Instructions
- Clone the `main` GIT repo
- Ensure Docker Desktop has started
- Install [Laravel Sail](https://laravel.com/docs/9.x/sail#installation) to the point of `./vendor/bin/sail up` to start the server
- Run `./vendor/bin/sail artisan migrate  --seed` to insert test data into the database
- Run `npm install` and `composer install` to install the dependencies
- Run `./vendor/bin/sail artisan schedule:work` to start the console commands
- Tests can be ran through sail or the standard artisan command `php artisan test`

## License

Built by Nick Howarth.
