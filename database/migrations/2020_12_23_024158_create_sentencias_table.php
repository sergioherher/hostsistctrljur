<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('juicio_id');
            $table->dateTime('fecha_sentencia')->nullable();
            $table->decimal('cant_sentencia')->nullable();
            $table->unsignedBigInteger('moneda_id');
            $table->dateTime('fecha_presentacion')->nullable();
            $table->decimal('monto_liquidado')->nullable();
            $table->dateTime('fecha_causa_estado')->nullable();
            $table->decimal('monto_aprobado')->nullable();
            $table->timestamps();

            $table->foreign('juicio_id')->references('id')->on('juicios')->onDelete('cascade');
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentencias');
    }
}
