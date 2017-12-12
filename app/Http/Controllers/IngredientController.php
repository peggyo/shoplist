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

        $ingredients = Ingredient::where('meal_id','=',$id)->get();

        # Adding zero to the quantity internally casts the number to remove leading and trailing zeros for display
        foreach ($ingredients as $ingredient) {
            if ($ingredient->quantity) {
                $ingredient->quantity += 0;
            }
        }

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

        $ingredients = Ingredient::where('meal_id','=',$id)->get();

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

        $this->validate($request, [
           'title' => 'required',
           'quantity' => 'numeric|min:0.1|max:300|nullable',
           'unit' => 'nullable',
           'department' => 'required'
       ]);

        $meal_id = $request->input('meal_id');
        #dump($meal_id);
        $meal = Meal::where('id', '=', $meal_id)->first();

        # Instantiate a new Meal Model object
        $ingredient = new Ingredient();

        $ingredient->title = $request->input('title');
        $ingredient->quantity = $request->input('quantity');
        $ingredient->unit = $request->input('unit');
        $ingredient->department = $request->input('department');
        #$ingredient->meal_id = $request->input('meal_id');
        #dd($meal);
        $ingredient->meal()->associate($meal);

        $ingredient->save();

        return redirect('/meal/'.$meal_id.'/add');

    }

    /*
    *  /ingredient/{id}/delete
    */
    public function delete($id)
    {

        $ingredient = Ingredient::find($id);

        if (!$ingredient) {
            return redirect('/ingredients/{id}/delete')->with('alert', 'Ingredient not found');
        }

        $title = $ingredient->title;
        $meal_id = $ingredient->meal_id;

        $ingredient->delete();

        return redirect('/meal/'.$meal_id.'/ingredients');
    }

}
