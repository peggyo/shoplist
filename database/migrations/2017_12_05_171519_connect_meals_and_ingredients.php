<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectMealsAndIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ingredients', function (Blueprint $table) {
            # This field `meal_id` is a foreign key that connects to the `id` field in the `meals` table
            $table->foreign('meal_id')->references('id')->on('meals');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ingredients', function (Blueprint $table) {
            # from Foobooks notes: ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('ingredients_meal_id_foreign');
            # Note, example in foobooks drops the column, but I think I only need to drop the FK
            # I did not have to change my meals table from original as done in Foobooks.
            # May remove line commented out below, after testing
            #$table->dropColumn('author_id');
        });
    }
}
