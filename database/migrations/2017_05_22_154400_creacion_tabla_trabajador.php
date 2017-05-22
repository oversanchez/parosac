<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('numero_documento',15)->unique();
            $table->enum('tipo_documento',['DN','CE','PA']);
            $table->date('fecha_nacimiento');
            $table->enum('sexo',['M','F']);
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('telf_movil');
            $table->string('telf_fijo')->nullable();
            $table->boolean('activo');
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
        Schema::dropIfExists('trabajador');
    }
}
