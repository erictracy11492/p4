<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Create task
Route::get('/tasks/create', 'TaskManagerController@create');
Route::post('/tasks', 'TaskManagerController@store');

#Edit task (ID needs to go in the 'put' route for this to work)
Route::get('/tasks/{id}/edit', 'TaskManagerController@edit');
Route::put('/tasks/{id}', 'TaskManagerController@update');

#Delete task
Route::get('/tasks/{id}/delete', 'TaskManagerController@delete');
Route::delete('tasks/{id}', 'TaskManagerController@destroy');

#View individual task
Route::get('/tasks/{id}', 'TaskManagerController@show');

#All tasks categorized
Route::get('/tasks', 'TaskManagerController@index');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
