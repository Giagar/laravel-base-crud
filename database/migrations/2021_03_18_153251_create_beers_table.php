<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string("name", 150);
            $table->string("color", 30);
            $table->float("alcohol", 5, 2); // in vol %
            $table->float("content", 6, 2); // in cl
            $table->float("price", 7, 2); // in €
            $table->string("description", 5000);
            $table->string("cover", 2048);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
