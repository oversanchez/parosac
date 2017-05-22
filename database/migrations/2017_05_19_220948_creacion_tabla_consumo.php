<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaConsumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menu');

            $table->integer('comensal_id')->unsigned();
            $table->foreign('comensal_id')->references('id')->on('comensal');
            
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
        Schema::dropIfExists('consumo');
    }
}
