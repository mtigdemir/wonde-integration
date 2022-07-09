[![Laravel](https://github.com/mtigdemir/wonde-integration/actions/workflows/laravel.yml/badge.svg)](https://github.com/mtigdemir/wonde-integration/actions/workflows/laravel.yml)

## How to run

- Clone Repository `git clone https://github.com/mtigdemir/wonde-integration.git`
- Run PHP Dependencies `composer install`
- Copy environment variables `cp .env.example .env`
- Build Assets `npm install && npm run dev`
- Define Wonde Token into Environment `WONDE_TOKEN={token}`
- Run Application `php artisan serve`

## Requirements

- PHP Version 8.0+
- Node Version 17.0+