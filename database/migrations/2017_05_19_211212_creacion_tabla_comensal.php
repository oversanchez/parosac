<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaComensal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comensal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('nombres');
            $table->string('numero_documento');
            $table->text('huella1')->nullable();
            $table->text('huella2')->nullable();
            $table->string('url_foto')->nullable();
            $table->boolean('activo')->default(true);

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('cliente');

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
        Schema::dropIfExists('comensal');
    }
}


