<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;

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
        dump($meal->toArray());
        dump($title);
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
    * PUT /meal/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'title' => 'required|min:5',
        'description' => 'required',
        ]);

        echo 'in update';

        $meal = Meal::find($id);

        $meal->title = $request->input('title');
        $meal->description = $request->input('description');
        $meal->save();

        #return redirect('/meal/'.$id.'/edit')->with('alert', 'Your changes were saved.');
        return redirect('/meal/'.$id.'/edit');
    }


/**************************************************************************/


    /*
     *  Shows detail information for a meal. THIS IS IN PROGRESS.
     *  STARTED OUT AS THE CODE FOR EDITING EXISTING MEAL, BUT STOPPED IN
     *  FAVOR OF UPDATE - THINKING....
     */
    public function detail($id)
    {
        $meal = Meal::find($id);
        /**********add error checking *******
        if (!$meal) {
            return redirect('/meal')->with('alert', 'Meal not found');
        }
        *************************************/

        dump($meal->toArray());

        return view('detail')->with(['meal' => $meal->toArray()]);

        }

}
