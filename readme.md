## How to Setup
- Clone this repo
- Copy .env.example to .env
- Setting database, stripe on .env
- Install depencies with command; composer install
- Generate app key with; php artisan key:generate
- Setup database credential and Stripe API on file .env
- Migrate the database with command; php artisan migrate:refresh --seed
- Link storage to public folder with command; php artisan storage:link

Default user you can find in folder Database/Seeds/UsersTableSeeder.php

## License

This project open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).