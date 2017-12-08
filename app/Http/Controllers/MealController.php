<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Ingredient;
use App\Selection;

class MealController extends Controller
{
    //

    /*
     *  Show an index of meals. Currently this lists all meals in the database.
     */
    public function index()
    {
        $meals = Meal::get();

        #return $meals;
        return view('index')->with([
            'meals' => $meals
        ]);
        #return 'Here is the list of meals...';
    }

    /*
     *  Open the create view to add a new meal
     */
    public function create()
    {
        return view('create');
    }

    /*
     * Save the data for the new meal to the database.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           'title' => 'required|min:5',
           'description' => 'required',
       ]);

        $title = $request->input('title');

        # Instantiate a new Meal Model object
        $meal = new Meal();

        $meal->title = $request->input('title');
        $meal->description = $request->input('description');
        $meal->save();
        #dump($meal->toArray());
        return view('create')->with([
            'title' => $title
        ]);
    }

    /*
    * GET /meal/{id}/edit
    */
    public function edit($id)
    {
        $meal = Meal::find($id);
        #dd($meal);

        return view('edit')->with(['meal' => $meal]);

    }


    /*
    *  /meal/{id}/confirm
    */
    public function confirm($id)
    {

        $meal = Meal::find($id);
        #dd($meal);
        if (!$meal) {
            return redirect('/meal')->with('alert', 'Meal not found');
        }
        $title = $meal->title;
        #dump($title);
        return view('delete')->with([
            'meal' => $meal,
            'previousUrl' => url()->previous() == url()->current() ? '/' : url()->previous(),
        ]);

    }

    /*
    *  /meal/{id}/delete
    */
    public function delete($id)
    {
        $meal = Meal::find($id);
        #dd($meal);
        if (!$meal) {
            return redirect('/meal')->with('alert', 'Meal not found');
        }
        $title = $meal->title;
        #dd($title);

        # Must also delete any associated Ingredients
        $ingredients = Ingredient::where('meal_id', '=', $id);
        #dd($ingredients);
        $ingredients->delete();
        $meal->selections()->detach();
        $meal->delete();
        return redirect('/')->with('alert', 'The meal '.$title.' was deleted.');
    }

    /*
    * PUT /meal/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'title' => 'required|min:5',
        'description' => 'required',
        ]);

        $meal = Meal::find($id);

        $meal->title = $request->input('title');
        $meal->description = $request->input('description');
        $meal->save();

        return redirect('/meal/'.$id.'/edit')->with('alert', 'Your changes were saved.');
    }



/**************************************************************************/



}
