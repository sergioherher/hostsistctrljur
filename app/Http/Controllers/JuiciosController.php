<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Intern, App\Juzgado, App\Juztipo, App\Macroetapa, App\DocTipo;

class JuiciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el detalle de un juicio
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detalleJuicio($juicio_id)
    {
        $juicio  = Juicio::where('id', $juicio_id)->first();
        $interno = Juicio::find($juicio_id)->intern()->first();
        $juzgado = Juicio::find($juicio_id)->juzgado()->first();
        $juztipo = Juicio::find($juicio_id)->juztipo()->first();
        $cliente = Juicio::find($juicio_id)->client()->first();
        $macroetapa = Juicio::find($juicio_id)->macroetapa()->first();
        $demandados = Juicio::find($juicio_id)->demandados()->get();
        $documentos = Juicio::find($juicio_id)->doc_juicios()->get();

        $juzgados = Juzgado::all();
        $internos = Intern::all();
        $juztipos = Juztipo::all();
        $macroetapas = Macroetapa::all();
        $doc_tipos = DocTipo::all();

        return view('juicios.verDetalleJuicio')->with('juicio', $juicio)
                                               ->with('internos', $internos)
                                               ->with('interno', $interno)
                                               ->with('juzgado', $juzgado)
                                               ->with('juzgados', $juzgados)
                                               ->with('juztipo', $juztipo)
                                               ->with('juztipos', $juztipos)
                                               ->with('cliente', $cliente)
                                               ->with('macroetapa', $macroetapa)
                                               ->with('macroetapas', $macroetapas)
                                               ->with('demandados', $demandados)
                                               ->with('documentos', $documentos)
                                               ->with('doc_tipos', $doc_tipos);
    }
}
