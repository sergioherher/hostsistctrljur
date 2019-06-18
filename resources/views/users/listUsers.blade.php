@extends('layouts.general.app')

@section('content')

<div class="row">
    <div class="col-xl-8">
        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
        	<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Usuarios
                    </h3>
                </div>
                <!--
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            
                        </div>
                    </div>
                </div>
                -->
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#kt_modal_1"><i class="flaticon-plus"></i>Agregar Usuario</button>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">  
                <table class="table">
                    <thead align="center">
                        <tr>
                            <th>
                                Usuario
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Rol
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody align="center" id="tbody_users">
                        @foreach ($users as $user)
                        <tr id="fila_user-{{ $user->id }}">
                            <td id="celda_user-{{ $user->id }}">
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <form action="{{ url('/users/changeUserRoles') }}" method="POST">
                                    @csrf
                                    <select class="form-control user_role" name="user_role" id="user_role-{{ $user->id }}">
                                        @foreach($roles as $role)
                                            @if($user->roles()->first()->id == $role->id)
                                                <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <input type="hidden" class="role_usuario" name="role_usuario" id="role_usuario-{{ $user->id }}" value="{{ $user->roles()->first()->id }}">
                                <input type="hidden" class="email_usuario" name="email_usuario" id="email_usuario-{{ $user->id }}" value="{{ $user->email }}">
                                <input type="hidden" class="nombre_usuario" name="nombre_usuario" id="nombre_usuario-{{ $user->id }}" value="{{ $user->name }}">
                                <input type="hidden" class="id_usuario" name="id_usuario" id="id_usuario-{{ $user->id }}" value="{{ $user->id }}">
                                <button class="btn btn-sm btn-outline-warning edit_user" data-toggle="modal" data-target="#kt_modal_2" id="edit_user-{{ $user->id }}"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger delete_user" id="delete_user-{{ $user->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="fila_user-to-clone" id="fila_user-to-clone" style="display: none">
                            <td class="celda_user-to-clone" id="celda_user-to-clone"></td>
                            <td class="celda_email-to-clone" id="celda_email-to-clone"></td>
                            <td>
                                <form action="{{ url('/users/changeUserRoles') }}" method="POST">
                                    @csrf
                                    <select class="form-control user_role-to-clone" name="user_role" id="user_role-to-clone">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <input type="hidden" class="role_usuario-to-clone" name="role_usuario" id="role_usuario-to-clone">
                                <input type="hidden" class="email_usuario-to-clone" name="email_usuario" id="email_usuario-to-clone">
                                <input type="hidden" class="nombre_usuario-to-clone" name="nombre_usuario" id="nombre_usuario-to-clone">
                                <input type="hidden" class="id_usuario-to-clone" name="id_usuario" id="id_usuario-to-clone">
                                <button class="btn btn-sm btn-outline-warning edit_user-to-clone" data-toggle="modal" data-target="#kt_modal_2" id="edit_user-to-clone"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger delete_user-to-clone" id="delete_user-to-clone"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>                
            </div>
        </div>
        <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="agregar_usuario" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregar_usuario">Agregar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="error_agregar_usuario" style="color:red;"></div>
                        <form class="kt-form" id="formAgregarUsuario">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Nombre</label>
                                    <div id="error" style="color:red;">
                                        {{$errors->first('nuevo_usuario_nombre')}}
                                    </div>
                                    <input class="form-control" type="text" id="nuevo_usuario_nombre" name="nuevo_usuario_nombre">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Password</label>
                                    <div style="color:red;">
                                        {{$errors->first('nuevo_usuario_password')}}
                                    </div>
                                    <input class="form-control" type="password" id="nuevo_usuario_password" name="nuevo_usuario_password">
                                    <input type="hidden" id="nuevo_usuario_password_hashed" name="nuevo_usuario_password_hashed">
                                    <input type="hidden" id="progress-wrp-value" value="0">
                                    <div class="progress" style="display: none">
                                        <div id="progress-wrp" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Email</label>
                                    <div style="color:red;">
                                        {{$errors->first('nuevo_usuario_email')}}
                                    </div>
                                    <input class="form-control" type="email" id="nuevo_usuario_email" name="nuevo_usuario_email">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Rol</label>
                                    <div style="color:red;">
                                        {{$errors->first('nuevo_usuario_role')}}
                                    </div>
                                    <select class="form-control" name="nuevo_usuario_role" id="nuevo_usuario_role">
                                        @foreach($roles as $role)
                                            @if($user->roles()->first()->id == $role->id)
                                                <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="guardar_usuario" class="btn btn-success">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="editar_usuario" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editar_usuario">Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editar_id_usuario" name="editar_id_usuario">
                        <div id="error_agregar_usuario" style="color:red;"></div>
                        <form class="kt-form" id="formEditarUsuario">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Nombre</label>
                                    <div id="error" style="color:red;">
                                        {{$errors->first('editar_usuario_nombre')}}
                                    </div>
                                    <input class="form-control" type="text" id="editar_usuario_nombre" name="editar_usuario_nombre">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Password</label>
                                    <div style="color:red;">
                                        {{$errors->first('editar_usuario_password')}}
                                    </div>
                                    <input class="form-control" autocomplete="false" type="password" id="editar_usuario_password" name="editar_usuario_password">
                                    <input type="hidden" id="editar_usuario_password_hashed" name="editar_usuario_password_hashed">
                                    <input type="hidden" id="progress-wrp-value" value="0">
                                    <div class="progress" style="display: none">
                                        <div id="progress-wrp" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Email</label>
                                    <div style="color:red;">
                                        {{$errors->first('editar_usuario_email')}}
                                    </div>
                                    <input readonly class="form-control" type="email" id="editar_usuario_email" name="editar_usuario_email">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-12">
                                    <label>Rol</label>
                                    <div style="color:red;">
                                        {{$errors->first('editar_usuario_role')}}
                                    </div>
                                    <select class="form-control" name="editar_usuario_role" id="editar_usuario_role">
                                        @foreach($roles as $role)
                                            @if($user->roles()->first()->id == $role->id)
                                                <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="actualizar_usuario" class="btn btn-success">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Javascript Section -->

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        function crypt(password){
            var salt;

            try{
                salt = gensalt(10);
            }catch(err){
                alert(err);
                return;
            }
            
            try {
                hashpw(
                    password,
                    salt,
                    result,
                    function() {
                        var progress_bar_id = "#progress-wrp";
                        var total = 100;
                        var position = $("#progress-wrp-value").val();
                        percent = Math.ceil(position / total * 100);
                        $(progress_bar_id).css("width", +percent + "%");
                        $("#progress-wrp-value").val(parseInt(position)+1);
                    });
            } catch(err){
                alert(err);
                return;
            }
        }

        function result(hash) {

            var nombre = $("#nuevo_usuario_nombre").val();
            var rol = $("#nuevo_usuario_role").val();
            var email = $("#nuevo_usuario_email").val();
            var password_hashed = hash;

            $.ajax({
                type: "POST",
                data: {
                    nombre:nombre, 
                    password:password_hashed,  
                    email:email, 
                    rol:rol, 
                },
                url: "{{ url('/users/registerUser') }}",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
    
                    var progress_bar_id = "#progress-wrp";
                    $("#progress-wrp-value").val(0);
                    $(progress_bar_id).css("width", "0%"); 
                    $(progress_bar_id).parent().hide(); 

                    if(data.operacion) {                     
                        $("#kt_modal_1").modal("hide");
                        $("#formAgregarUsuario").trigger("reset");

                        var id = data.usuario.id;

                        $(".fila_user-to-clone").clone()
                                                .appendTo("#tbody_users")
                                                .removeClass("fila_user-to-clone")
                                                .addClass("fila_user-cloned").attr("id", "fila_user-"+id).show();
                        $("#fila_user-"+id+" .celda_user-to-clone").attr("id", "celda_user-"+id).html(data.usuario.name);
                        $("#fila_user-"+id+" .celda_email-to-clone").attr("id", "celda_email-"+id).html(data.usuario.email);
                        $("#fila_user-"+id+" .user_role-to-clone").removeClass("user_role-to-clone").addClass("user_role-cloned").attr("id", "user_role-"+id).val(data.role_id);
                        attach_change_role();
                        $("#fila_user-"+id+" .role_usuario-to-clone").attr("id", "role_usuario-"+id).val(data.role_id);
                        $("#fila_user-"+id+" .email_usuario-to-clone").attr("id", "email_usuario-"+id).val(data.usuario.email);
                        $("#fila_user-"+id+" .nombre_usuario-to-clone").attr("id", "nombre_usuario-"+id).val(data.usuario.name);
                        $("#fila_user-"+id+" .id_usuario-to-clone").attr("id", "id_usuario-"+id).val(data.usuario.id);
                        $("#fila_user-"+id+" .edit_user-to-clone").removeClass("edit_user-to-clone").addClass("edit_user").attr("id", "edit_user-"+id);
                        attach_edit_user();
                        $("#fila_user-"+id+" .delete_user-to-clone").removeClass("delete_user-to-clone").addClass("delete_user").attr("id", "delete_user-"+id);
                        attach_delete_user();
                        toastr.success("Se agregó correctamente el rol del usuario", "Agregar usuario");
                    } else {
                        $("#error_agregar_usuario").html("Un usuario con este email ya existe, escriba uno diferente");
                    }

                },
                error: function(data) {
                    console.log(data);    
                    var progress_bar_id = "#progress-wrp";
                    $("#progress-wrp-value").val(0);
                    $(progress_bar_id).css("width", "0%"); 
                    $(progress_bar_id).parent().hide(); 
                    toastr.error("Ocurrió un error al intentar crear el perfil", "Agregar usuario");
                },
            });

        }
        
        toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": false,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        };

        $("#guardar_usuario").click(function(e){
            e.preventDefault();
            var progress_bar_id = "#progress-wrp";
            $(progress_bar_id).parent().show();
            crypt($("#nuevo_usuario_password").val());
        });

        function attach_change_role() {

            $(".user_role-cloned").off()
            $('.user_role-cloned').change(function(e){
                var array_user = this.id.split("-");
                var user = array_user[1];
                var role = $(this).val();

                if(confirm("Está seguro de querer cambiar el rol de este usuario")) {           

                    $.ajax({
                        type: "POST",
                        data: {user:user, role:role, },
                        url: "{{ url('/users/changeUserRoles') }}",
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $("#role_usuario-"+data.user.id).val(data.role_id);
                            toastr.success("Se modificó correctamente el rol del usuario", "Rol de usuario");
                        },
                        error: function(data) {
                            console.log(data);
                            toastr.error("Ocurrió un error al intentar guardar el perfil", "Rol de usuario");
                        },
                    });
                }
            });

        }

        function attach_edit_user() {
            $(".edit_user").off();
            $(".edit_user").click(function(e){
                $('#editar_id_usuario').val($(this).siblings('.id_usuario-to-clone').val());
                $('#editar_usuario_nombre').val($(this).siblings('.nombre_usuario-to-clone').val());
                $('#editar_usuario_email').val($(this).siblings('.email_usuario-to-clone').val());
                $('#editar_usuario_role').val($(this).siblings('.role_usuario-to-clone').val());
            });
        }

        function attach_delete_user() {
            $(".delete_user").off();
            $(".delete_user").click(function(e){
                var array_user = this.id.split("-");
                var user = array_user[1];

                if(confirm("Está seguro de querer eliminar este usuario")) {           

                    $.ajax({
                        type: "POST",
                        data: {user:user},
                        url: "{{ url('/users/deleteUser') }}",
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            toastr.success("Se eliminó correctamente el usuario", "Eliminar usuario");
                            $("#fila_user-"+data.message).remove();
                        },
                        error: function(data) {
                            console.log(data);
                            toastr.error("Ocurrió un error al intentar eliminar el uaurio", "Eliminar usuario");
                        },
                    });
                }
            });
        }

        $(".user_role").change(function(e){
            e.preventDefault();

            var array_user = this.id.split("-");
            var user = array_user[1];
            var role = $(this).val();

            if(confirm("Está seguro de querer cambiar el rol de este usuario")) {           

                $.ajax({
                    type: "POST",
                    data: {user:user, role:role, },
                    url: "{{ url('/users/changeUserRoles') }}",
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $("#role_usuario-"+data.user.id).val(data.role_id);
                        toastr.success("Se modificó correctamente el rol del usuario", "Rol de usuario");
                    },
                    error: function(data) {
                        console.log(data);
                        toastr.error("Ocurrió un error al intentar guardar el perfil", "Rol de usuario");
                    },
                });
            }
        });

        $(".delete_user").click(function(e){
            e.preventDefault();

            var array_user = this.id.split("-");
            var user = array_user[1];

            if(confirm("Está seguro de querer eliminar este usuario")) {           

                $.ajax({
                    type: "POST",
                    data: {user:user},
                    url: "{{ url('/users/deleteUser') }}",
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        toastr.success("Se eliminó correctamente el usuario", "Eliminar usuario");
                        $("#fila_user-"+data.message).remove();
                    },
                    error: function(data) {
                        console.log(data);
                        toastr.error("Ocurrió un error al intentar eliminar el uaurio", "Eliminar usuario");
                    },
                });
            }
        });

        $(".edit_user").click(function(e){
            $('#editar_id_usuario').val($(this).siblings('.id_usuario').val());
            $('#editar_usuario_nombre').val($(this).siblings('.nombre_usuario').val());
            $('#editar_usuario_email').val($(this).siblings('.email_usuario').val());
            $('#editar_usuario_role').val($(this).siblings('.role_usuario').val());
        });

        $("#actualizar_usuario").click(function(e){
            e.preventDefault();
            if(confirm("Está seguro de querer editar este usuario")) {
                var progress_bar_id = "#progress-wrp";
                $(progress_bar_id).parent().show();
                crypt_edit($("#editar_usuario_password").val());
            }
        });

        function crypt_edit(password){
            var salt;

            try{
                salt = gensalt(10);
            }catch(err){
                alert(err);
                return;
            }
            
            try {
                hashpw(
                    password,
                    salt,
                    result_edit,
                    function() {
                        var progress_bar_id = "#progress-wrp";
                        var total = 100;
                        var position = $("#progress-wrp-value").val();
                        percent = Math.ceil(position / total * 100);
                        $(progress_bar_id).css("width", +percent + "%");
                        $("#progress-wrp-value").val(parseInt(position)+1);
                    });
            } catch(err){
                alert(err);
                return;
            }
        }

        function result_edit(hash) {

            var nombre = $("#editar_usuario_nombre").val();
            var rol = $("#editar_usuario_role").val();
            var email = $("#editar_usuario_email").val();
            var password_hashed = hash;

            $.ajax({
                type: "POST",
                data: {
                    nombre:nombre, 
                    password:password_hashed,  
                    email:email, 
                    rol:rol, 
                },
                url: "{{ url('/users/updateUser') }}",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.operacion) {                     
                        $("#kt_modal_2").modal("hide");
                        $("#formEditarUsuario").trigger("reset");
                        $("#celda_user-"+data.usuario_id).html(data.usuario_nombre);

                        var progress_bar_id = "#progress-wrp";
                        $("#progress-wrp-value").val(0);
                        $(progress_bar_id).css("width", "0%"); 
                        $(progress_bar_id).parent().hide(); 

                        toastr.success(data.message, data.title);
                    } else {
                        toastr.error(data.message, data.title);
                    }

                },
                error: function(data) {
                    console.log(data);
                    toastr.error(data.message, data.title);
                },
            });

        }
    });
</script>

@endsection