<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estado_id');
            $table->bigInteger('numero_credito');
            $table->unsignedBigInteger('juzgado_id');
            $table->text('expediente');
            $table->unsignedBigInteger('juiciotipo_id');
            $table->dateTime('ultima_fecha_boletin');
            $table->text('extracto');
            $table->text('notas_seguimiento');
            $table->dateTime('fecha_proxima_accion');
            $table->text('proxima_accion');
            $table->float('monto_demandado');
            $table->float('importe_credito');
            $table->unsignedBigInteger('macroetapa_id');
            $table->text('garantia');
            $table->text('datos_rpp');
            $table->text('otros_domicilios');
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('juzgado_id')->references('id')->on('juzgados')->onDelete('cascade');
            $table->foreign('juiciotipo_id')->references('id')->on('juiciotipos')->onDelete('cascade');
            $table->foreign('macroetapa_id')->references('id')->on('macroetapas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juicios');
    }
}
