# Crypto_info_app
Crypto coin market reporting app

## Setup
1. Navigate to folder crypto-api/
2. Edit .env file: Change the database information
3. Run: `composer install`
4. Migrate Database: Run `php artisan migrate`
5. Run seed `php artisan db:seed --class=CoinSeeder`
6. Start application: `php artisan serve`
7. Navigate to folder crypto-app/
8. Run: 'npm install'
9. Run: 'npm run dev' at this stage.
10. Et voila...



