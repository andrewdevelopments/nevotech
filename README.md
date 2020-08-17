## About Laravel


make a new project in your Laragon, XAMPP, MAMP app

go to project folder

git clone https://github.com/andrewdevelopments/nevotech.git . (added a dot at the end to extract only the subfolders)

composer install

copy .env.example to .env

php artisan key:generate

open .env file and replace

DB_DATABASE=yourdatabase

DB_USERNAME=yourusernameifyouhave

DB_PASSWORD=yourpasswordifyouhave

php artisan migrate:fresh --seed
