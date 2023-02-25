## About

Added soon......

## Requirements to run locally

- Docker Desktop.
- [Laravel Sail](https://laravel.com/docs/9.x/sail#installation) to run with Docker and run out local enviroment
- NPM 8.3.1
- Node v16.14.0

## Instructions
- Clone the `main` GIT repo.
- Ensure Docker Desktop has started.
- Get [Laravel Sail](https://laravel.com/docs/9.x/sail#installation) up and running to the point of `./vendor/bin/sail up`
- Get the database up and running with test data is through a sail artisan command, please run `./vendor/bin/sail artisan migrate:refresh --seed`.
- run `npm install` and `composer install`.
- To get the console commands up and runnnung `./vendor/bin/sail artisan schedule:work`

## License

Built by Nick Howarth.
