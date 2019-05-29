<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Estado;

class HomeController extends Controller
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
    public function index()
    {

        $juicios = Juicio::all();
        $estados = Estado::all();

        return view('home')->with("juicios", $juicios)
                           ->with("estados", $estados);
    }
}
