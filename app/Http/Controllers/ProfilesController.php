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

    public function changeUserRoles(Request $request)
    {
        $user = $request->input("user");
        $role = $request->input("role");

        $rol_new = Role::where('id',$role)->first();

        try {
            $user = User::where("id",$user)->first();
            $rol_ant = $user->roles()->first();
            $user->roles()->attach($rol_new);
            $user->roles()->detach($rol_ant);
            $result = array('operacion' => true, 'message' => $rol_new);

        } catch (Exception $e) {
            $result = array('operacion' => false, 'message' => "Falló");
        }

        return json_encode($result);
    }

    public function registerUser(Request $request)
    {
        $nombre = $request->input("nombre");
        $password = $request->input("password");
        $email = $request->input("email");
        $role = $request->input("rol");

        $password_para_verificar = substr($password, 3);
        $password_hashed = "$2y".$password_para_verificar;

        $usuario_role = Role::where('id', $role)->first();

        $usuario_existe = User::where('email', $email)->first();

        try {

          if($usuario_existe) {
            $result = array('operacion' => false, 'message' => "El usuario existe");
          } else {
            $usuario = new User();
            $usuario->name = $nombre;
            $usuario->email = $email;
            $usuario->password = $password_hashed;
            $usuario->save();
            $usuario->roles()->attach($usuario_role);

            $result = array('operacion' => true, 'message' => $usuario);
          }
          
        } catch (Exception $e) {
          $result = array('operacion' => false, 'message' => $e->getMessage());
        }

        return json_encode($result);
    }

    public function deleteUser(Request $request) {
      $usuario_id = $request->input('user');
      try {
        $usaurio = User::find($usuario_id)->delete();
        $result = array('operacion' => true, 'message' => $usuario_id);
      } catch (Exception $e) {
        $result = array('operacion' => false, 'message' => $e->getMessage());
      }
       return json_encode($result);
      
    }
}
