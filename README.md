## Installation Process

- Clone this repo `git clone https://github.com/asliabir/simple-crud.git`
- Change Directory to `cd simple-crud`
- Create a database in your database server
- Copy the .env.example file Windows: `copy .env.example .env` Linux: `cp .env.example .env`
- Open .env file and add database information previously created on step-3
- Generate key `php artisan key:generate`
- Install Packeges `composer install`
- Install Node Modules `npm install`, `npm run dev`
- Migrate Database `php artisan migrate:fresh --seed`
- Run Server `php artisan serve`
- Browse http://localhost:8000

## Preview
- Browse http://localhost:8000

Thank You