<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('juicio_id');
            $table->text('name');
            $table->integer('codemandado');
            $table->timestamps();

            $table->foreign('juicio_id')->references('id')->on('juicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandados');
    }
}
