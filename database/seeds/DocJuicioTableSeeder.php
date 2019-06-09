<?php

use Illuminate\Database\Seeder;
use App\DocJuicio;

class DocJuicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$doc_juicio = new DocJuicio();
		$doc_juicio->ruta_archivo = "fundatorios-1.pdf";
        $doc_juicio->juicio_id = 1;
        $doc_juicio->doc_tipo_id = 1;
		$doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "expediente-1.pdf";
        $doc_juicio->juicio_id = 1;
        $doc_juicio->doc_tipo_id = 2;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "otros-1.pdf";
        $doc_juicio->juicio_id = 1;
        $doc_juicio->doc_tipo_id = 3;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "fundatorios-2.pdf";
        $doc_juicio->juicio_id = 2;
        $doc_juicio->doc_tipo_id = 1;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "expediente-2.pdf";
        $doc_juicio->juicio_id = 2;
        $doc_juicio->doc_tipo_id = 2;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "otros-2.pdf";
        $doc_juicio->juicio_id = 2;
        $doc_juicio->doc_tipo_id = 3;
        $doc_juicio->save();
    }
}