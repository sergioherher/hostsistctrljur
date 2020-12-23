<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentenciasDictamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentencias_dictamens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sentencia_id');
            $table->text('nombre_perito')->nullable();
            $table->decimal('valor_del_dictamen')->nullable();
            $table->dateTime('fecha_de_emision')->nullable();
            $table->text('tipo_de_perito')->nullable();
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
        Schema::dropIfExists('sentencias_dictamens');
    }
}
