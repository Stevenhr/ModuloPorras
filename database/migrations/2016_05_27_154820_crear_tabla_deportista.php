<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDeportista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('deportista', function (Blueprint $table) {
            $table->integer('Id_Deportista');
            $table->integer('Id_Persona');
            $table->integer('Tipo_Deportista');
            $table->integer('Departamento');
            $table->integer('Eps');
            $table->string('Situacion_Militar');
            $table->string('Direccion_Residencia');
            $table->integer('Estrato');
            $table->integer('Barrio');
            $table->integer('Localidad');
            $table->string('Telefono_Fijo');
            $table->string('Telefono_Celular');
            $table->string('Correo_Ectronico');
            $table->integer('Tipo_Sangre');
            $table->integer('Estado_Civil');
            $table->integer('Hijos');
            $table->integer('Banco');
            $table->integer('Cuenta');
            $table->integer('Agrupacion');
            $table->integer('Deporte');
            $table->integer('Modalidad');
            $table->integer('Etapa');
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
        Schema::drop('deportista');
    }
}
