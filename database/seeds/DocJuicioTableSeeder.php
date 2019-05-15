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
		$doc_juicio->ruta_archivo = "pdfs_juicios/juicio_id_1/doc_juicio_id_1.pdf";
        $doc_juicio->juicio_id = 1;
        $doc_juicio->doc_tipo_id = 1;
		$doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "pdfs_juicios/juicio_id_1/doc_juicio_id_2.pdf";
        $doc_juicio->juicio_id = 1;
        $doc_juicio->doc_tipo_id = 2;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "pdfs_juicios/juicio_id_1/doc_juicio_id_3.pdf";
        $doc_juicio->juicio_id = 1;
        $doc_juicio->doc_tipo_id = 3;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "pdfs_juicios/juicio_id_2/doc_juicio_id_4.pdf";
        $doc_juicio->juicio_id = 2;
        $doc_juicio->doc_tipo_id = 1;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "pdfs_juicios/juicio_id_2/doc_juicio_id_5.pdf";
        $doc_juicio->juicio_id = 2;
        $doc_juicio->doc_tipo_id = 2;
        $doc_juicio->save();

        $doc_juicio = new DocJuicio();
        $doc_juicio->ruta_archivo = "pdfs_juicios/juicio_id_2/doc_juicio_id_6.pdf";
        $doc_juicio->juicio_id = 2;
        $doc_juicio->doc_tipo_id = 3;
        $doc_juicio->save();
    }
}