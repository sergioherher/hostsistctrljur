<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuiciosOficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juicios_oficios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('juicio_id');
            $table->unsignedBigInteger('oficio_id');
            $table->dateTime('recibido')->nullable();
            $table->dateTime('entregado')->nullable();
            $table->dateTime('contestado')->nullable();
            $table->dateTime('recordatorio_recibido')->nullable();
            $table->dateTime('recordatorio_entregado')->nullable();
            $table->dateTime('recordatorio_contestado')->nullable();
            $table->boolean('da_domicilio');
            $table->text('domicilio_dado')->nullable();
            $table->boolean('domicilio_habilitado_autos');
            $table->boolean('diligenciado');
            $table->dateTime('fecha_diligencia')->nullable();
            $table->text('resultado_diligencia')->nullable();
            $table->timestamps();

            $table->foreign('juicio_id')->references('id')->on('juicios')->onDelete('cascade');
            $table->foreign('oficio_id')->references('id')->on('oficios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juicios_oficios');
    }
}
