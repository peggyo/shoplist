<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /*
    * Relationship method
    */
    public function ingredients()
    {
        # Meal has many Ingredients
        # Define a one-to-many relationship.
        return $this->hasMany('App\Ingredient');
    }

    public function selections()
    {
        # Comment from lecture/foobooks notes:
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Selection')->withTimestamps();
    }


    //******************************************************
    /* Dev Tool copied from Foobooks to assist in debugging.
    * Dump the essential details of meals to the page
    * Used when practicing queries and you want to quickly see the meals in the database
    * Can accept a Collection of meals, or if none is provided, will default to all Meals
    */
    public static function dump($meals = null)
    {
        $data = [];
        if (is_null($meals)) {
            $meals = self::all();
        }
        foreach ($meals as $meal) {
            $data[] = $meal->title;
        }
        dump($data);
    }
}
