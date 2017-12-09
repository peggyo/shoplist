<?php

use Illuminate\Database\Seeder;
use App\Selection;

class SelectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $selections = [
             ['Quick Meals'],
             ['Dec. 10 Ideas'],
             ['Freezer Meals']
         ];

         $count = count($selections);

         foreach ($selections as $key => $selection) {
             Selection::insert([
                 'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                 'title' => $selection[0]
             ]);
             $count--;
         }
     }
}
