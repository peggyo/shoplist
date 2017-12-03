<?php

use Illuminate\Database\Seeder;
use App\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $ingredients = [
            ['Pizza Dough', 1, 'package','Deli', '6'],
            ['Pizza Sauce', 1, 'jar','Grocery', '6'],
            ['Mozzarella Cheese', 8, 'oz','Dairy', '6'],
            ['Olive Oil',null,null ,'Grocery', '6'],
            ['Salad Fixings',null,null,'Produce', '6'],

            # Quick Quesadillas
            ['Flour Tortillas',1, 'package','Bakery', '8'],
            ['Rotisserie Chicken', 1 , 'chicken','Deli', '8'],
            ['Mexican Cheese Blend', 8 , 'oz','Dairy', '8'],
            ['Taco Seasoning', 1 , 'package','International', '8'],
            ['Olive Oil',null, null,'Grocery', '8'],
            ['Salsa',null, null,'Grocery', '8'],
            ['Sour Cream',null, null,'Dairy', '8'],
            ['Guacamole',null, null,'Produce', '8'],

            # Chicken Cacciatore
            ['Skinless Chicken Thighs','4', '4-oz','Meat', '1'],
            ['Onion','1', null,'Produce', '1'],
            ['Garlic Cloves','3', null,'Produce', '1'],
            ['Sliced Mushrooms','3', 'Cups','Produce', '1'],
            ['Diced Tomatoes','1', '14 oz. can','Grocery', '1'],
            ['Green Bell Pepper','1', null,'Produce', '1'],
            ['Tomato Paste','.25', 'Cups','Grocery', '1'],
            ['Oregano, dried','1', 'tsp.','Baking Needs', '1'],
            ['Black Pepper',null, null,'Baking Needs', '1'],
            ['Olive Oil',null, null,'Grocery', '1'],
            ['Cooked Spaghetti','4', 'Cups','Grocery', '1'],

            # Beef or Chicken with Broccoli
            ['Beef or Chicken','.75', 'Pounds','Meat', '3'],
            ['Cornstarch','2', 'Tbsp.','Baking Needs', '3'],
            ['Broth','.5', 'Cups','Grocery', '3'],
            ['Oyster Sauce','2', 'Tbsp.','International', '3'],
            ['Honey','2', 'Tbsp.','Grocery', '3'],
            ['Soy Sauce','1', 'Tbsp.','Grocery', '3'],
            ['Dry Sherry','1', 'Tbsp.','Grocery', '3'],
            ['Broccoli','1', 'Pound','Produce', '3'],
            ['Minced Ginger','1', 'Tbsp.','Produce', '3'],
            ['Garlic Cloves','1', 'Tbsp.','Produce', '3'],
            ['Olive Oil','3', 'Tbsp.','Grocery', '3']
        ];

        $count = count($ingredients);

        foreach ($ingredients as $key => $ingredient) {
            Ingredient::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $ingredient[0],
                'quantity' => $ingredient[1],
                'unit' => $ingredient[2],
                'department' => $ingredient[3],
                'meal_id' => $ingredient[4]

            ]);
            $count--;
        }
    }
}
