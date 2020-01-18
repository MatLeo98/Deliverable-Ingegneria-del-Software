<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('anniesperienza');
            $table->string('titolostudio');
            $table->smallInteger('eta');
            $table->smallinteger('punteggio');
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
        Schema::dropIfExists('candidatura');
    }
}
