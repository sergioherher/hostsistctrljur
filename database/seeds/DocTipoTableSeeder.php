<?php

use Illuminate\Database\Seeder;
use App\DocTipo;

class DocTipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$doc_tipo = new DocTipo();
		$doc_tipo->tipo = "Documentos Fundatorios";
        $doc_tipo->slug = "fundatorios";
		$doc_tipo->save();

        $doc_tipo = new DocTipo();
        $doc_tipo->tipo = "Expediente Judicial";
        $doc_tipo->slug = "expediente";
        $doc_tipo->save();

        $doc_tipo = new DocTipo();
        $doc_tipo->tipo = "Otros Documentos";
        $doc_tipo->slug = "otros";
        $doc_tipo->save();
    }
}