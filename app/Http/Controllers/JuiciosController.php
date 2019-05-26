<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Colaborator, App\Juzgado, App\Juiciotipo, App\Macroetapa, App\DocTipo, App\User;

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
        $juzgado = Juicio::find($juicio_id)->juzgado()->first();
        $juiciotipo = Juicio::find($juicio_id)->juiciotipo()->first();
        $juiciousers = Juicio::find($juicio_id)->juiciousers()->get();
        $macroetapa = Juicio::find($juicio_id)->macroetapa()->first();
        $demandados = Juicio::find($juicio_id)->demandados()->get();
        $documentos = Juicio::find($juicio_id)->doc_juicios()->get();

        $juzgados = Juzgado::all();
        $juiciotipos = Juiciotipo::all();
        $macroetapas = Macroetapa::all();
        $doc_tipos = DocTipo::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'colaborador');
        })->get();

        $clientes = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'cliente');
        })->get();

        foreach ($juiciousers as $juiciouser) {
          if($juiciouser->role_id == 2) {
            $colaborator = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 3) {
            $cliente = $juiciouser->user()->first();
          }
        }

        return view('juicios.verDetalleJuicio')->with('juicio', $juicio)
                                               ->with('colaborators', $users)
                                               ->with('colaborator', $colaborator)
                                               ->with('juzgado', $juzgado)
                                               ->with('juzgados', $juzgados)
                                               ->with('juiciotipo', $juiciotipo)
                                               ->with('juiciotipos', $juiciotipos)
                                               ->with('cliente', $cliente)
                                               ->with('macroetapa', $macroetapa)
                                               ->with('macroetapas', $macroetapas)
                                               ->with('demandados', $demandados)
                                               ->with('documentos', $documentos)
                                               ->with('doc_tipos', $doc_tipos);
    }
}
