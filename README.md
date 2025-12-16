System Requirements:
PHP: 7.4+
Composer
MySQL
Node.js & npm
Git

Clone the Repository:
git clone https://github.com/Janvidavda13/Laravel_Project.git
cd Laravel_Project

Laravel 8
composer install
npm install
please add .env file which shared in mail.
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
php artisan storage:link
chmod -R 775 storage bootstrap/cache
npm run dev
php artisan serve
