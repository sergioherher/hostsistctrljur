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
            $rol_ant = $user->roles()->get();

            $user->roles()->detach($rol_ant);
            
            $user->roles()->attach($rol_new);
            
            if($rol_new->slug == "administrador") { 
              $rol_colaborador = Role::where('slug','colaborador')->first();
              $rol_coordinador = Role::where('slug','coordinador')->first();
              $user->roles()->attach($rol_coordinador);
              $user->roles()->attach($rol_colaborador); 
            }

            if($rol_new->slug == "coordinador") { 
              $rol_colaborador = Role::where('slug','colaborador')->first();
              $user->roles()->attach($rol_colaborador); 
            }

            $result = array('operacion' => true, 'role_id' => $rol_new, 'user' => $user);

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

            if($usuario_role->slug == "administrador") { 
              $rol_colaborador = Role::where('slug','colaborador')->first();
              $rol_coordinador = Role::where('slug','coordinador')->first();
              $usuario->roles()->attach($rol_coordinador);
              $usuario->roles()->attach($rol_colaborador); 
            }

            if($usuario_role->slug == "coordinador") { 
              $rol_colaborador = Role::where('slug','colaborador')->first();
              $usuario->roles()->attach($rol_colaborador); 
            }

            $roles = $usuario->roles()->get();

            if($roles->contains("slug", "administrador")) {
              $role_id = 1;
            } elseif ($roles->contains("slug", "coordinador")) {
              $role_id = 2;
            } else {
              $role_id = $usuario->roles()->first()->id;
            }

            $result = array('operacion' => true, 'usuario' => $usuario, 'role_id' => $role_id);
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

    public function updateUser(Request $request) {
      $nombre = $request->input("nombre");
      $password = $request->input("password");
      $email = $request->input("email");
      $rol = $request->input("rol");

      $password_para_verificar = substr($password, 3);
      $password_hashed = "$2y".$password_para_verificar;

      $usuario_role = Role::where('id', $rol)->first();
      $usuario_existe = User::where('email', $email)->first();

      if(empty($usuario_existe)) {
        $resultado = array('operacion' => false, 'message'=>'Este usuario no existe en nuestros registros', 'title'=>'El usuario no existe');
        return json_encode($resultado);
      } else {

        try {

          $usuario_existe->name = $nombre;
          $usuario_existe->password = $password_hashed;
          $usuario_existe->save();

          $usuario_existe->roles()->detach(Role::all());

          $usuario_existe->roles()->attach($usuario_role);

          if($usuario_role->id == 1) { 
            $rol_colaborador = Role::where('slug','colaborador')->first();
            $rol_coordinador = Role::where('slug','coordinador')->first();
            $usuario_existe->roles()->attach($rol_coordinador);
            $usuario_existe->roles()->attach($rol_colaborador); 
          }

          if($usuario_role->id == 2) { 
            $rol_colaborador = Role::where('slug','colaborador')->first();
            $usuario_existe->roles()->attach($rol_colaborador); 
          }

          $resultado = array('operacion' => true, 'message'=>'El usuario se editó correctamente', 'title'=>'Edición de usuario', 'usuario_id' => $usuario_existe->id, 'usuario_nombre' => $usuario_existe->name);
          return json_encode($resultado);

        } catch (Exception $e) {
          
          $resultado = array('operacion' => false, 'message' => $e->getMessage());
          return json_encode($resultado);
        }
        
      }
    }
}
