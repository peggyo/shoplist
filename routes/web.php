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

#===============================================================================
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
Route::put('/meal/{id}/edit','MealController@edit');

# Delete a specific meal
Route::get('/meal/{id}/confirm', 'MealController@confirm');
Route::delete('/meal/{id}/delete', 'MealController@delete');

# I think these were added and then I changed course, but leaving until I am sure removing them is okay.
# By commenting them out, I can test and make sure nothing 'dies' - The controller doesn't have a
# detail method, so that's pretty certain, but less certain about update.
#Route::post('/meal/{id}/update/', 'MealController@update');
#Route::get('/meal/{id}/detail/', 'MealController@detail');

#===============================================================================
# INGREDIENTS:

# Form to add ingredients to a meals
Route::get('meal/{id}/ingredients', 'IngredientController@ingredients');

# Process the form to add ingredients to the meal
Route::get('meal/{id}/add', 'IngredientController@add');
Route::post('meal/add', 'IngredientController@store');

Route::any('ingredient/{id}/delete','IngredientController@delete');

#===============================================================================
# SELECTIONS: (these are lists, but list is a reserved word)
# Show a list of all selections.
Route::get('/selections/', 'SelectionController@catalog');

# Form to Create a new selection.
Route::get('selections/createlist', 'SelectionController@createlist');
# Process the form to create the selection.
Route::post('selections/createlist/{title}','SelectionController@createlist');
# Store the new selection in the database.
Route::post('selections/createlist', 'SelectionController@storelist');

# Show the form to edit a specific selection.
Route::get('selections/{id}/edit', 'SelectionController@edit');
# Process the form to edit a specific selection.
Route::put('selections/{id}', 'SelectionController@updatelist');

# Delete a specific selection
Route::get('selections/{id}/confirm', 'SelectionController@confirm');
Route::delete('selections/{id}/delete', 'SelectionController@delete');

# Attach or Detach Meals to a Selection (Shopping List)
Route::any('/selections/{id}/meals', 'SelectionController@maintain');
Route::any('/selections/{id}/{mealid}/moveout','SelectionController@moveout');
Route::any('/selections/{id}/{mealid}/movein','SelectionController@movein');

# Generate a Shopping List of INGREDIENTS
Route::get('/selections/{id}/shop', 'SelectionController@shoplist');

#===============================================================================
# DEBUGGING TOOLS:   From course notes, and useful:

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /* From course notes:
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
