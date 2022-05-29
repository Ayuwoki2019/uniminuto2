<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('numeroDocumento')->comment('Numero de documento de identificacion');
            $table->string('cod_student')->comment('Numero de identificacion de la inivercidad');
            $table->char('nombre1')->nullable()->comment('primer nombre del estudiante');
            $table->char('nombre2')->nullable()->comment('segundo nombre del estudiante');
            $table->char('apellido1')->comment('primer apellido del estudiante');
            $table->char('apellido2')->comment('segundo apellido del estudiante');
            $table->integer('edad')->comment('edad del estudiante');
            $table->date('fechaNacimiento')->comment('fecha de nacimiento del estudiante');
            $table->char('carrera')->comment('carrera que esta cursando el estudiante');
            $table->char('periodo')->comment('periodo cuando hizo ese semestre el estudiante');
            $table->char('semestre')->comment('semestre el estudiante');
            $table->char('promedio')->comment('promedio de que octuvo el estudiante');
            $table->char('creditos')->comment('creditos logrados del estudiante ');
            $table->char('estado')->nullable()->comment('estado del estudiante');
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
        Schema::dropIfExists('students');
    }
};
