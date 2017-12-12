<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Selection;
use App\Ingredient;

class SelectionController extends Controller
{
    // NOTE: Selection is the term used for List because List is a reserved word.
    // selections is a result set of 0 or more lists,
    // selection (singular), if set, should be one specific list.

    /*
     *  Show an index of selections.
     * Currently this shows all selections (lists) in the database.
     */
    public function catalog()
    {
        $selections = Selection::get();

        return view('selections.userlists')->with([
            'selections' => $selections
        ]);
    }

    /*
     *  Open the create view to add a new list (selection)
     */
    public function createlist()
    {

        return view('selections/createlist');

    }

    /*
     * Save the data for the new selection to the database.
     */
    public function storelist(Request $request)
    {

        $this->validate($request, [
           'title' => 'required|min:5'
       ]);

        $title = $request->input('title');

        # Instantiate a new Selection Model object
        $selection = new Selection();

        $selection->title = $request->input('title');
        $selection->save();

        return view('selections.createlist')->with([
            'title' => $title
        ]);
    }

    /*
    * GET /selections/{id}/edit
    */
    public function edit($id)
    {
        $selection = Selection::find($id);

        return view('selections.edit')->with(['selection' => $selection]);

    }

    /*
     * Save the data for the new selection to the database.
     */
    public function updatelist(Request $request, $id)
    {
        $this->validate($request, [
           'title' => 'required|min:5'
        ]);

        # Find the Selection Model object to update
        $selection = Selection::find($id);
        if (!$selection) {
            return redirect('/selections')->with('alert', 'Shopping List not found');
        }
        $selection->title = $request->input('title');
        $selection->save();
        return redirect('/selections/')->with('alert', 'The selection was updated.');

    }

    /*
    *  /selections/{id}/confirm
    */
    public function confirm($id)
    {

        $selection = Selection::find($id);
        #dd($selection);
        if (!$selection) {
            return redirect('/selections')->with('alert', 'Shopping List not found');
        }
        $title = $selection->title;
        #dump($title);
        return view('selections.delete')->with([
            'selection' => $selection,
            'previousUrl' => url()->previous() == url()->current() ? '/' : url()->previous(),
        ]);

    }

    /*
    *  /selection/{id}/delete
    */
    public function delete($id)
    {
        $selection = Selection::find($id);
        if (!$selection) {
            return redirect('/selection')->with('alert', 'Shopping List not found');
        }
        $title = $selection->title;
        $selection->meals()->detach();
        $selection->delete();
        return redirect('/selections/')->with('alert', 'The selection '.$title.' was deleted.');
    }

    /*
    *  /selection/{id}/meals
    *  Display a page for users to select meals to add or remove from the
    *  Selection (list) identified by $id
    */
    public function maintain($id)
    {

        # array to hold meal for those in the selection. Used to find meals both not in this selection AND in no selection.
        $inmealsarr = [];

        $selection = Selection::where('id', '=', $id)->first();
        foreach ($selection->meals as $meal) {
            $inmealsarr[] = $meal->id;
        }

        $inmeals = $selection->meals;                               # meals in this selection
        $outmeals = Meal::whereNotIn('id', $inmealsarr)->get();     # meals not in this and/or any selection

        return view('selections.selectmeals')->with(['selection' => $selection,
                                                     'inmeals' => $inmeals,
                                                     'outmeals' => $outmeals]);

    }

    /*
    *  /selection/{id}/{mealid}/moveout
    */
    public function moveout($id, $mealid)
    {
        # First get the selection list
        $selection = Selection::find($id);

        $meal = Meal::where('id', '=', $mealid)->first();
        $selection->meals()->detach($meal);

        return redirect('/selections/'.$id.'/meals');

    }

    /*
    *  /selection/{id}/{mealid}/movein
    */
    public function movein($id, $mealid)
    {
        # First get the selection list
        $selection = Selection::find($id);

        $meal = Meal::where('id', '=', $mealid)->first();
        $selection->meals()->save($meal);

        return redirect('/selections/'.$id.'/meals');

    }

    /*
    *
    * Generate a list of ingredients
    */
    public function shoplist($id)
    {

        # array to hold meal for those in the selection. Used to find meals both not in this selection AND in no selection.
        $inmealsarr = [];

        $selection = Selection::where('id', '=', $id)->first();
        foreach ($selection->meals as $meal) {
            $inmealsarr[] = $meal->id;
        }

        $ingredients = Ingredient::whereIn('meal_id', $inmealsarr)->orderBy('department', 'DESC')->get();     # meals not in this and/or any selection

        # Adding zero to the quantity internally casts the number to remove leading and trailing zeros for display
        foreach ($ingredients as $ingredient) {
            if ($ingredient->quantity) {
                $ingredient->quantity += 0;
            }
        }

        return view('selections.shoplist')->with(['ingredients' => $ingredients]);

     }
}
