<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //
    /*
    * Dump the essential details of books to the page
    * Used when practicing queries and you want to quickly see the books in the database
    * Can accept a Collection of books, or if none is provided, will default to all books
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
