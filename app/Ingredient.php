<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    // Each ingredient belongs to a single Meal
    public function meal()
    {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Meal');
    }

}
