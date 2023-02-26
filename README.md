## About

DarkInvader coding test to build a Ticketing system to generate and process tickets through console commands.
The app renders a frontend for stats, open tickets (unprocessed) and closed tickets (processed). Along with the ability to view tickets linked to a user and look at individual tickets.

The project is built in Laravel 10 and Vue 3 utilising [Inertia JS](https://inertiajs.com/).
Inertia is an amazing new technology that allows the use of classic server-side routing to build a Single Page App without needing to build an API.

## Requirements to run locally

- Docker Desktop.
- [Laravel Sail](https://laravel.com/docs/9.x/sail#installation) to run with Docker and run the local enviroment
- NPM 8.3.1
- Node v16.14.0

## Instructions
- Clone the `main` GIT repo.
- Ensure Docker Desktop has started.
- Get [Laravel Sail](https://laravel.com/docs/9.x/sail#installation) up and running to the point of `./vendor/bin/sail up`
- Get the database up and running with test data through the sail artisan command, please run `./vendor/bin/sail artisan migrate  --seed`.
- run `npm install` and `composer install` to get the dependencies installed.
- To get the console commands up and runnnung `./vendor/bin/sail artisan schedule:work`
- Tests can be ran through sail or the standard `php artisan test`

## License

Built by Nick Howarth.
