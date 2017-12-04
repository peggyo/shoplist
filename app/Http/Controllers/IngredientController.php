<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Ingredient;

class IngredientController extends Controller
{
    //
    /*
    * GET /meal/{id}/ingredients
    */
    public function ingredients($id)
    {
        $meal = Meal::find($id);
        #dump($meal);
        $ingredients = Ingredient::where('meal_id','=',$id)->get();
        #dd($ingredients->toArray());
        #dump($meal->id);

        return view('ingredients.ingredients')->with(            [
                'meal' => $meal,
                'ingredients' => $ingredients
            ]);

    }

    /*
    * GET /meal/{id}/add
    */
    public function add($id)
    {
        $meal = Meal::find($id);
        #dump($meal);
        $ingredients = Ingredient::where('meal_id','=',$id)->get();
        #dd($ingredients->toArray());

        return view('ingredients.add')->with(            [
                'meal' => $meal,
                'ingredients' => $ingredients
            ]);
    }

    /*
     * Save the data for the new ingredient to the database.
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
           'title' => 'required|min:5',
           'description' => 'required',
       ]);
       */
        $meal_id = $request->input('meal_id');
        #dump($meal_id);
        $title = $request->input('title');

        # Instantiate a new Meal Model object
        $ingredient = new Ingredient();

        $ingredient->title = $request->input('title');
        $ingredient->quantity = $request->input('quantity');
        $ingredient->unit = $request->input('unit');
        $ingredient->department = $request->input('department');
        $ingredient->meal_id = $request->input('meal_id');

        $ingredient->save();
        #dump($ingredient->toArray());
        #dump($title);
        return redirect('/meal/'.$meal_id.'/add');

    }

    /*
    *  /ingredient/{id}/delete
    */
    public function delete($id)
    {

        $ingredient = Ingredient::find($id);
        #dd($ingredient);
        if (!$ingredient) {
            return redirect('/ingredients/{id}/delete')->with('alert', 'Ingredient not found');
        }
        $title = $ingredient->title;
        $meal_id = $ingredient->meal_id;
        #dump($meal_id);
        $ingredient->delete();

        return redirect('/meal/'.$meal_id.'/ingredients');
    }

}
