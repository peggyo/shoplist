<?php

use Illuminate\Database\Seeder;
use App\Meal;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $meals = [
             ['Chicken Cacciatore', 'Chicken with tomato, mushrooms, onion, and bellpepper sauce over pasta.'],
             ['Artichokes a la Polita','Artichokes and other vegetables in an avgolemono sauce.'],
             ['Beef or Chicken with Broccoli','Chinese style stir fry broccoli with rice.'],
             ['Herb Roasted Chicken and Potatoes','Roast whole chicken with herbs and pan roasted potatoes.'],
             ['Fish with Tomatoes, Olives, and Capers','Easy fish dish for white, flakey fish, with salad and rice.'],
             ['Easy Pizza','Make a quick pizza using supermarket dough.'],
             ['Basic Risotto','A base for risotto. Add vegetables and protein on hand to customize.'],
             ['Quick Quesadillas','Have basic quesadillas using rotisserie chicken from the store.']
         ];

         $count = count($meals);

         foreach ($meals as $key => $meal) {
             Meal::insert([
                 'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'title' => $meal[0],
                 'description' => $meal[1],
             ]);
             $count--;
         }
     }
}
