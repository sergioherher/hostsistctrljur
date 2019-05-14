<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detalleJuicio($juicio_id)
    {
        $juicio = Juicio::where('id', $juicio_id)->first();
        return view('juicios.verDetalleJuicio')->with('juicio', $juicio);
    }
}
