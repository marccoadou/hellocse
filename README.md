# How to set up


You'll need two terminal instances, one for the front-end, the other for laravel

`cd hellocse-front; npm install; npm run dev;` -> this should open the SPA

this will serve the laravel backend
`cd hellocse; composer install;`
`cp .env.example .env`

Here you need to create the sqlite database 
`touch database.sqlite;` 
The database path needs to be written in the laravel `.env`

`php artisan key:generate; php artisan migrate:fresh;`
if you want seeded data (there won't be pictures)
`php artisan db:seed`

`php artisan serve;`

If everything is set up by default on your machine, the port used by the SPA is `5173` 
and the backend uses `8000`

However, if something is not working, you could also change the ENDPOINT in the `.env` front-end file

Laravel Telescope is installed, so you can check requests at `localhost/telescope`
