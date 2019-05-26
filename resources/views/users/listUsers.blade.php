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
            </div>
            <div class="kt-portlet__body">  
                <table>
                    <thead>
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
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <form action="{{ url('/users/changeUserRoles') }}" method="POST">
                                    @csrf
                                    <select class="form-control" name="user_role" id="user_role">
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
                                <form action="{{ url('/users/deleteUser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_usario" value="{{ $user->id }}">
                                    <button class="btn btn-sm btn-danger" id="delete_user"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Javascript Section -->

@section('scripts')

<script type="text/javascript">
    $(document).ready(function{
        $("#user_role").change(function(e){
            if(confirm("Está seguro de querer cambiar el rol de este usuario")) {
                $.ajax({
                    url:
                });
            }
        });
    });
</script>

@endsection