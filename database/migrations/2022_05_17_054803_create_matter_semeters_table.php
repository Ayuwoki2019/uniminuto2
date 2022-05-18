<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterSemetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_semeters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('semeter_id');
            $table->foreign('semeter_id')->references('id')->on('semeters');
            $table->foreignId('matter_id')->references('id')->on('matters');
            //si se dio cuenta?era eso ?//el nombre es mal escrito...//probemos :vuno por uno o un rollbakc?
            //no es mejor que borre las tablas? en la base de datos ... yes/ creo que ya
            //hasta que horas pa// ya !! gracias parce!!
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
        Schema::dropIfExists('matter_semeters');
    }
}
