@extends('layouts.general.app')

@section('content')
<!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Juicios Existentes
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="{{ url('exportar_excel') }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon fa fa-file-excel"></i>
                                            <span class="kt-nav__link-text">Exportar a excel</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="row align-items-center">
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-input-icon kt-input-icon--left">
                                            <input type="text" class="form-control" placeholder="Buscar..." id="generalSearch">
                                            <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                <span><i class="la la-search"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label">
                                                <label>Estado:</label>
                                            </div>
                                            <div class="kt-form__control">
                                                <select class="form-control bootstrap-select" id="kt_form_status">
                                                    <option value="">Todos</option>
                                                    @foreach($estados as $estado)
                                                    <option value="{{ $estado->estado }}">{{ $estado->estado }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin: Datatable -->
                    <table class="kt-datatable" id="html_table" width="100%">

                        <thead>
                            <tr>
                                <th title="Field #1">Juzgado</th>
                                <th title="Field #2">Expediente</th>
                                <th title="Field #3">Demandado</th>
                                <th title="Field #4">Última Fecha de Boletín</th>
                                <th title="Field #5">Próxima Acción</th>
                                <th title="Field #6">Acciones</th>
                                <th title="Field #7">Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($juicios as $juicio)
                            <tr>
                                <td>{{ $juicio->juzgado()->first()->juzgado }}</td>
                                <td>{{ $juicio->expediente }}</td>
                                <td>{{ $juicio->demandados()->where('codemandado', 0)->first()["name"] }}</td>
                                <td>{{ date("d/M/Y",strtotime($juicio->ultima_fecha_boletin)) }}</td>
                                <td>{{ date("d/M/Y",strtotime($juicio->fecha_proxima_accion)) }}</td>
                                <td>
                                    @role('cliente', 'colaborador', 'administrador')
                                    <a href="{{url('reporte_juicio/'.$juicio->id)}}" class="btn btn-sm btn-label-brand" title="Reporte de Juicio"><i class="fa fa-file-pdf"></i></a>
                                    @endrole
                                    @role('colaborador', 'administrador')
                                    <a href="{{url('juicios/'.$juicio->id)}}" class="btn btn-sm btn-label-warning" title="Reporte de Juicio"><i class="fa fa-edit"></i></a>
                                    @endrole
                                    @role('administrador')
                                    <a href="{{url('juicios/'.$juicio->id)}}" class="btn btn-sm btn-label-danger" title="Reporte de Juicio"><i class="fa fa-trash"></i></a>
                                    @endrole
                                </td>
                                <td>{{ $juicio->estado()->first()->estado }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>

    <!--End::Section-->
@endsection

<!-- Javascript Section -->

@section('scripts')

<script type="text/javascript" src="{{asset('js/datatables/juicios-html.js?v=0.0.4')}}"></script>
<script type="text/javascript">
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

    @if( Session::has('resultado') )
        var resultado = <?=Session::get('resultado')?>;

        if(resultado.operacion){
            toastr.success(resultado.message, resultado.title);
        } else {
            toastr.error(resultado.error_message, resultado.title);    
        }
    @endif

</script>

@endsection
