1. As database we use (database.sqlite) file which is located in the database directory of the project.
2. copy .env.example to .env
3. run (composer install)
2. In order to run the project just call in terminal (php artisan serve) and open the browser with the address returned in terminal.
3. We have 1 endpoint which is (POST /api/submit) and it takes 3 parameters in body (name, email, message).
Validation rules are described in \App\Http\Requests\SubmitRequest.php file.
4. In order to run the tests just call in terminal (php artisan test).
5. After submission is saved in the database, you can check log which our event listener is writing in the log file (storage/logs/laravel.log).
