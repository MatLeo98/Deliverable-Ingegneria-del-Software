<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Offers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titolo');
            $table->text('descrizione');
            $table->string('categoria');
            $table->float('stipendio')->nullable();
            $table->string('tipocontratto');
            $table->string('luogo')->nullable();
            $table->string('email')
                  ->foreign('email')
                  ->references('email')->on('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('offers');

    }
}
