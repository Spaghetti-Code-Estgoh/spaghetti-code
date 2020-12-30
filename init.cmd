call composer install
call npm install
call copy .env.example .env
call php artisan key:generate
call php artisan config:cache
call php artisan config:clear
call composer dump-autoload -o
call composer update
call copy .env.example .env
call php artisan key:generate
