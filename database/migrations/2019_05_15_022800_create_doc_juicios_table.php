<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocJuiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_juicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ruta_archivo', 250);
            $table->unsignedBigInteger('juicio_id');
            $table->unsignedBigInteger('doc_tipo_id');
            $table->timestamps();

            $table->foreign('doc_tipo_id')->references('id')->on('doc_tipos')->onDelete('cascade');
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
        Schema::dropIfExists('doc_jucios');
    }
}
