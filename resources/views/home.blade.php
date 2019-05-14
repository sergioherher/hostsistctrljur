@extends('layouts.general.app')

@section('content')
<!--Begin::Section-->
    <div class="row">
        <div class="col-xl-8">
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
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                            <span class="kt-nav__link-text">Reports</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-send"></i>
                                            <span class="kt-nav__link-text">Messages</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                            <span class="kt-nav__link-text">Charts</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                            <span class="kt-nav__link-text">Members</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                            <span class="kt-nav__link-text">Settings</span>
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
                                                    <option value="activa">Activa</option>
                                                    <option value="vencida">Vencida</option>
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
                                <th title="Field #1">Expediente</th>
                                <th title="Field #2">Demandado</th>
                                <th title="Field #3">Juzgado</th>
                                <th title="Field #4">Última Fecha de Boletín</th>
                                <th title="Field #5">Próxima Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><a href="{{url('juicio/1')}}">2249/2017</a></td>
                                <td>ARREDONDO TIZNADO LUIS ALEJANDRO</td>
                                <td>1C</td>
                                <td>06/Abr/2019</td>
                                <td>14/may/2019</td>
                            </tr>

                            <tr>
                                <td>123/2019</td>
                                <td>AVILA CARRIZALES JANETTE</td>
                                <td>3M</td>
                                <td>10/May/2019</td>
                                <td>12/may/2019</td>
                            </tr>

                            <tr>
                                <td>937/2018</td>
                                <td>BECERRA CAMACHO ANTONIO </td>
                                <td>4C</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>234/2019</td>
                                <td>BUCIO BEJAR J. ELI</td>
                                <td>8C</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>2349/2015</td>
                                <td>BUSTOS SILVA ARMANDO </td>
                                <td>2MO</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
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

<script type="text/javascript" src="{{asset('js/datatables/juicios-html.js')}}"></script>

@endsection
