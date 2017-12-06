<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    //
    public function meals()
    {
        # Comment from lecture/foobooks notes:
        # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Meal')->withTimestamps();
    }

}
