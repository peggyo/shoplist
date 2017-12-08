<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Selection;

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
        #dd('SelectController create');
        return view('selections/createlist');

    }

    /*
     * Save the data for the new selection to the database.
     */
    public function storelist(Request $request)
    {
        #dump($request);
        $this->validate($request, [
           'title' => 'required|min:5'
       ]);

        $title = $request->input('title');

        # Instantiate a new Selection Model object
        $selection = new Selection();

        $selection->title = $request->input('title');
        $selection->save();
        #dump($selection->toArray());
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
        $selection->delete();
        return redirect('/selections/')->with('alert', 'The selection '.$title.' was deleted.');
    }

    /*
    *  /selection/{id}/meals
    */
    public function maintain($id)
    {
        $inmealsarr = [];

        $selection = Selection::where('id', '=', $id)->first();

        foreach ($selection->meals as $meal) {
            $inmealsarr[] = $meal->id;
        }
        #dump($inmealsarr);

        $inmeals = $selection->meals;
        #dump($inmeals);
        $outmeals = Meal::whereNotIn('id', $inmealsarr)->get();
        #dd($outmeals);
        #dump($selection);
        #dump($inmeals);
        #dump($outmeals);
        #dd('end');

        return view('selections.selectmeals')->with(['selection' => $selection,
                                                     'inmeals' => $inmeals,
                                                     'outmeals' => $outmeals]);

    }

}
