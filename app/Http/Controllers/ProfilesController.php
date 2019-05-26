<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Colaborator, App\Juzgado, App\Juiciotipo, App\Macroetapa, App\DocTipo, App\User, App\Role;

class ProfilesController extends Controller
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
    public function listUsers()
    {
        $users = User::all();

        /*$users->map(function($user){
            $user->role_desc = $user->roles();
        });*/

        $roles = Role::all();

        return view('users.listUsers')->with('users', $users)
                                      ->with('roles', $roles);
    }
}
