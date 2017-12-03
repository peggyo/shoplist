<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {

            # Increments method will make a Primary, Auto-Incrementing field.
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
		    # keep track of changes to a row
            $table->timestamps();

            $table->string('title');                    # name of the ingredient item.
            $table->decimal('quantity',8,3)->nullable();    # quantity of item needed
            $table->string('unit')->nullable();         # unit of measure. Examples: cup, quart, ounce, stalk, medium, gram, tsp, ...
            $table->string('department');               # grocery store category? Maybe should be department, still not sure on this one.
            $table->integer('meal_id');                 # links to the meal id for which this is an ingredient.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
