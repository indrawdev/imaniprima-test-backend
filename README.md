# clone repository

git clone https://github.com/indrawdev/imaniprima-test-frontend

# install package

composer update

# set dbname, dbusername, dbpassword on .env

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imaniprima_test
DB_USERNAME=root
DB_PASSWORD=password

# migrate and seed dummy data

php artisan migrate:refresh --seed

# start backend

php -S localhost:8000 -t public
