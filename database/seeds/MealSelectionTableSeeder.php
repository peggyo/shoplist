<?php

use Illuminate\Database\Seeder;
use App\Meal;
use App\Selection;

class MealSelectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the meals we want to associate selections with
        # The *key* will be the meal title, and the *value* will be an array of selections.
        # Note: Not all meals have selections. All selections do have meals. Change in future???
        $meals = [
            'Chicken Cacciatore' => ['List One', 'List Three'],
            'Beef or Chicken with Broccoli' => ['List Two', 'List Three'],
            'Artichokes a la Polita' => ['List One'],
            'Easy Cheese Pizza' => ['List One', 'List Two', 'List Three']
        ];

        # Now loop through the above array, creating a new pivot for each meal to selection
        foreach ($meals as $title => $selections) {

            # First get the meal
            $meal = Meal::where('title', 'like', $title)->first();

            # Now loop through each selection for this meal, adding the pivot
            foreach ($selections as $selectionTitle) {
                $selection = Selection::where('title', 'LIKE', $selectionTitle)->first();

                # Connect this selection to this meal
                $meal->selections()->save($selection);
            }
        }
    }
}
