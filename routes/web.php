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

# Commenting out but leaving for review purposes
#Route::get('/', function () {
#    return view('index');
#});

# MEALS:

# Show a list of all meals.
Route::get('/', 'MealController@index');

# Form to Create a new meal.
Route::get('/meal/create', 'MealController@create');
# Process the form to create the meal.
Route::post('/meal/create/{title}','MealController@create');
# Store the new meal in the database.
Route::post('/meal/create', 'MealController@store');

# Show the form to edit a specific meal.
Route::get('/meal/{id}/edit', 'MealController@edit');
# Process the form to edit a specific meal.
Route::put('/meal/{id}', 'MealController@update');

# Delete a specific meal
Route::any('/meal/{id}/confirm', 'MealController@confirm');
Route::any('/meal/{id}/delete', 'MealController@delete');

Route::post('/meal/{id}/update/', 'MealController@update');
Route::get('/meal/{id}/detail/', 'MealController@detail');

# INGREDIENTS:

# Form to add ingredients to a meals
Route::get('meal/{id}/ingredients', 'IngredientController@ingredients');
# Process the form to add ingredients to the meal
Route::get('meal/{id}/add', 'IngredientController@add');
Route::post('meal/add', 'IngredientController@store');

Route::get('ingredient/{id}/delete','IngredientController@delete');

# DEBUGGING TOOLS:

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

Route::get('/debugbar', function () {

    $data = ['foo' => 'bar'];
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';
});
