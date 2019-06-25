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
            $table->bigInteger('numero_credito')->nullable();
            $table->text('meta_legal')->nullable();
            $table->unsignedBigInteger('juzgado_id');
            $table->unsignedBigInteger('juzgadotipo_id');
            $table->text('expediente')->nullable();
            $table->unsignedBigInteger('juiciotipo_id');
            $table->dateTime('ultima_fecha_boletin')->nullable();
            $table->text('extracto')->nullable();
            $table->dateTime('fecha_proxima_accion')->nullable();
            $table->text('proxima_accion')->nullable();
            $table->unsignedBigInteger('moneda_id');
            $table->decimal('monto_demandado',20,2)->nullable();
            $table->decimal('importe_credito',20,2)->nullable();
            $table->unsignedBigInteger('macroetapa_id');
            $table->text('garantia')->nullable();
            $table->text('datos_rpp')->nullable();
            $table->text('otros_domicilios')->nullable();
            $table->text('procesos_asoc')->nullable();
            $table->unsignedBigInteger('salaapela_id');
            $table->text('toca')->nullable();
            $table->text('autoridad_amparo')->nullable();
            $table->text('expediente_amparo')->nullable();
            $table->text('autoridad_recurso_amparo')->nullable();
            $table->text('expediente_recurso_amparo')->nullable();
            $table->text('audiencia_juicio')->nullable();
            $table->timestamps();

            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('juzgado_id')->references('id')->on('juzgados')->onDelete('cascade');
            $table->foreign('juzgadotipo_id')->references('id')->on('juzgadotipos')->onDelete('cascade');
            $table->foreign('juiciotipo_id')->references('id')->on('juiciotipos')->onDelete('cascade');
            $table->foreign('macroetapa_id')->references('id')->on('macroetapas')->onDelete('cascade');
            $table->foreign('salaapela_id')->references('id')->on('salaapelas')->onDelete('cascade');
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
