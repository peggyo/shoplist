<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_selections', function (Blueprint $table) {
            $table->increments('id');   # Primary key, autoincrement

            # this adds the created_at and updated_at columns
            $table->timestamps();

            $table->date('start_date');     # start of selection time period
		    $table->date('day_of_week');    # selected for which specific day
            $table->integer('meal_id');     # reference to specific meal in meals table

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_selections');
    }
}
