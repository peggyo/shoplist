<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealSelectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * meal_selection is the pivot table between the meals and selections table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_selection', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('meal_id')->unsigned();
            $table->integer('selection_id')->unsigned();

            # Make foreign keys
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('selection_id')->references('id')->on('selections');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_selection');
    }
}
