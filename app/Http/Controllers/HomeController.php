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
        
        $estados = Estado::all();

        $user = \Auth::user();

        if($user->hasRole('administrador')) {
            $juicios = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
        } elseif ($user->hasRole('coordinador')) {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "coordinador"){
                        return true;
                    }
                }
            });
        } elseif ($user->hasRole('colaborador')) {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "colaborador"){
                        return true;
                    }
                }
            });
        } else {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "cliente"){
                        return true;
                    }
                }
            });
        }

        return view('home')->with("juicios", $juicios)
                           ->with("estados", $estados);
    }
}
