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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->char('cod')->nullable()->comment('codigo del parametro');
            $table->char('nombre')->nullable()->comment('Nombre del parametro');
            $table->integer('number')->nullable()->comment('parametro tipo numerico');
            $table->text('text')->nullable()->comment('parametro tipo texto');
            $table->boolean('boolean')->nullable()->comment('parametro tipo boleano');
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
        Schema::dropIfExists('parametros');
    }
};
