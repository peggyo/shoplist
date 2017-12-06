<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
 * Table will store shopping list names, really names of lists of meals.
 * Logically, it should be the 'List Table' but because list is a
 * reserved word in PHP, there is a conflict with the PHP list() method
 * so an alternative name is being used.
 */

class CreateSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');    # title identifying selections list title
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selections');
    }
}
