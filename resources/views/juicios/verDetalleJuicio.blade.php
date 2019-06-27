@extends('layouts.general.app')

@section('content')
<!--Begin::Section-->
<div class="row">
    <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--break-sm">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Editar Juicio Expediente: {{ $juicio->expediente }},  Demandado: 
                            @foreach($demandados as $key => $demandado)
								@if($demandado->codemandado == 0)
									{{ $demandado->name }}
								@endif
							@endforeach
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <button class="btn btn-success guardar-juicio">
	                		Guardar
	                	</button>
                    </div>
                </div>
                <div class="kt-portlet__body">
                	<form class="kt-form" id="formGuardarJuicio" action="{{ url('juicio/guardarJuicio') }}" method="POST" enctype="multipart/form-data">
    					@csrf    	
			    		<input type="hidden" id="editar_o_crear" name="editar_o_crear" value="1">
			    		<input type="hidden" id="juicio_id" name="juicio_id" value="{{ $juicio->id }}">
	                	<div class="form-group row" style="display: @if(!Auth::user()->can('administrar-perfiles')) none @endif" >                    		
	                		<div class="col-lg-6">	
	                			<label>Coordinador</label>							
								<div style="color:red;" class="error_label" id="error-coordinador">
									{{$errors->first('coordinador')}}
								</div>
								<select id="coordinador" name="coordinador" class="form-control">
									<option value="">Seleccione</option>
									@foreach ($coordinadores as $coordinad)
										@if (old('estado') == $coordinad->id || $coordinador->id == $coordinad->id)
											<option value="{{ $coordinad->id }}" selected="selected">{{ $coordinad->name }}</option>
										@else
											<option value="{{ $coordinad->id }}">{{ $coordinad->name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>                	
	                	<div class="form-group row">
	                		<div class="col-lg-6">
								<label>Estado</label>
								<div style="color:red;" class="error_label" id="error-estado">
									{{$errors->first('estado')}}
								</div>
								@if(Auth::user()->can('cargar-juicios')) 
									<select id="estado" name="estado" class="form-control" @role("colaborador") readonly @endrole>
										<option value="">Seleccione</option>
										@foreach ($estados as $estad)
											@if (old('estado') == $estad->id || $estado->id == $estad->id)
												<option value="{{ $estad->id }}" selected="selected">{{ $estad->estado }}</option>
											@else
												<option value="{{ $estad->id }}">{{ $estad->estado }}</option>
											@endif
										@endforeach
									</select>
									<span class="form-text text-muted">Seleccione el estado en el que se encuentra el juicio</span>
								@else
									<input class="form-control" type="text" readonly name="desc_estado" value="{{ $estado->estado }}">
									<input type="hidden" name="estado" value="{{ $estado->id }}"> 
								@endif
							</div>
							<div class="col-lg-6">
								<label>Cliente</label>
								<div style="color:red;" class="error_label" id="error-cliente">
									{{$errors->first('cliente')}}
								</div>
								@if(Auth::user()->can('cargar-juicios')) 
									<select id="cliente" name="cliente" class="form-control" @role("colaborador") readonly @endrole>
										<option value="">Seleccione</option>
										@foreach ($clientes as $client)
											@if (old('cliente') == $client->id || $cliente->user()->first()->id == $client->id)
												<option value="{{ $client->id }}" selected="selected">{{ $client->name }}</option>
											@else
												<option value="{{ $client->id }}">{{ $client->name }}</option>
											@endif
										@endforeach
									</select>
									<span class="form-text text-muted">Seleccione el cliente asociado a este juicio</span>
								@else
									<input class="form-control" type="text" readonly name="desc_cliente" value="{{ $cliente->user()->first()->name }}">
									<input type="hidden" name="cliente" value="{{ $cliente->user()->first()->id }}"> 
								@endif
							</div>						
						</div>
	                	<div class="form-group row">
	                		<div class="col-lg-6">
								<label>Colaborador</label>
								<div style="color:red;" class="error_label" id="error-colaborator">
									{{$errors->first('colaborator')}}
								</div>
								@if(Auth::user()->can('cargar-juicios')) 
									<select id="colaborator" name="colaborator" class="form-control" @role("colaborador") readonly @endrole>
										<option value="">Seleccione</option>
										@foreach ($colaborators as $colaborat)
											@if (old('colaborator') == $colaborat->id || $colaborator->id == $colaborat->id)
												<option value="{{ $colaborat->id }}" selected="selected">{{ $colaborat->name }}</option>
											@else
												<option value="{{ $colaborat->id }}">{{ $colaborat->name }}</option>
											@endif
										@endforeach
									</select>
									<span class="form-text text-muted">Seleccione al colaborador responsable de este juicio</span>
								@else
									<input class="form-control" type="text" readonly name="desc_colaborador" value="{{ $colaborator->name }}">
									<input type="hidden" name="colaborator" value="{{ $colaborator->id }}"> 
								@endif
							</div>
							<div class="col-lg-6">
								<label>Información de contacto del cliente</label>
								<div style="color:red;">
									{{$errors->first('user_contact_info')}}
								</div>
								<input type="text" class="form-control" id="user_contact_info" name="user_contact_info" value="@if(null !== old('user_contact_info')){{ old('user_contact_info') }}@else{{ $cliente->user_contact_info }}@endif" placeholder="Información de contacto ...">
								<span class="form-text text-muted">Escriba información adicional de contacto del cliente</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Número de Crédito</label>
								<div style="color:red;">
									{{$errors->first('numero_credito')}}
								</div>
								<input type="text" class="form-control" id="numero_credito" name="numero_credito" value="@if(null !== old('numero_credito')){{ old('numero_credito') }}}@else{{ $juicio->numero_credito }}@endif" placeholder="Nº Crédito ...">
								<span class="form-text text-muted">Escriba el numero de crédito de ser el caso</span>
							</div>
							<div class="col-lg-6">
								@foreach($demandados as $key => $demandado)
									@if($demandado->codemandado == 0)
										@if($demandados->count() == 1)
											<label>Demandado</label>
											<div style="color:red;" class="error_label" id="error-demandado">
												{{$errors->first('demandado')}}
											</div>
											<input type="text" class="form-control" id="demandado" name="demandado" value="@if(null !== old('demandado')){{ old('demandado') }}@else{{ $demandado->name }}@endif" placeholder="Demandado...">
											<span class="form-text text-muted">Escriba el nombre del demandado en este juicio</span>
											<label>Codemandado</label>
											<div style="color:red;">
												{{$errors->first('codemandado')}}
											</div>
											<input type="text" class="form-control" id="codemandado" name="codemandado" value="@if(null !== old('codemandado')){{ old('codemandado') }}@endif" placeholder="Codemandado...">
											<span class="form-text text-muted">Escriba el nombre del codemandado en este juicio</span>
										@else
											<label>Demandado</label>
											<div style="color:red;" class="error_label" id="error-demandado">
												{{$errors->first('demandado')}}
											</div>
											<input type="text" class="form-control" id="demandado" name="demandado" value="@if(null !== old('demandado')){{ old('demandado') }}@else{{ $demandado->name }}@endif" placeholder="Demandado...">
											<span class="form-text text-muted">Escriba el nombre del demandado en este juicio</span>
										@endif
									@else
										<label>Codemandado</label>
										<div style="color:red;">
											{{$errors->first('codemandado')}}
										</div>
										<input type="text" class="form-control" id="codemandado" name="codemandado" value="@if(null !== old('codemandado')){{ old('codemandado') }}@else{{ $demandado->name }}@endif" placeholder="Codemandado...">
										<span class="form-text text-muted">Escriba el nombre del codemandado en este juicio</span>
									@endif
								@endforeach
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-4">
								<label>Meta Legal</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('meta_legal')}}
								</div>
								<textarea class="form-control" rows="2" id="meta_legal" name="meta_legal" placeholder="Meta legal ...">@if(null !== old('meta_legal')){{ old('meta_legal') }}@else{{ $juicio->meta_legal }}@endif</textarea>
							</div>
							<div class="col-lg-4">
								<label>Tipo de Juzgado</label>
								<div style="color:red;" class="error_label" id="error-juzgadotipo">
									{{$errors->first('juzgadotipo')}}
								</div>
								<select id="juzgadotipo" name="juzgadotipo" class="form-control">
									@foreach ($juzgadotipos as $juzgadotip)
										@if (old('juzgadotipo') == $juzgadotip->id || $juzgadotipo->id == $juzgadotip->id)
											<option value="{{ $juzgadotip->id }}" selected="selected">{{ $juzgadotip->juztipo }}</option>
										@else
											<option value="{{ $juzgadotip->id }}">{{ $juzgadotip->juztipo }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione el tipo de juzgado donde se desarrolla el juicio</span>
							</div>
							<div class="col-lg-4">
								<label>Juzgado</label>
								<div style="color:red;" class="error_label" id="error-juzgado">
									{{$errors->first('juzgado')}}
								</div>
								<select id="juzgado" name="juzgado" class="form-control" >
									<option value="">Seleccione</option>
									@foreach ($juzgados as $juzgad)
										@if (old('juzgado') == $juzgad->id || $juzgad->id == $juzgado->id)
											<option value="{{ $juzgad->id }}" data-id="{{ $juzgad->juzgadotipo_id }}" selected="selected">{{ $juzgad->juzgado }}</option>
										@else
											<option value="{{ $juzgad->id }}" data-id="{{ $juzgad->juzgadotipo_id }}" >{{ $juzgad->juzgado }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Para habilitar este campo debe seleccionar primero un tipo de juzgado</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Expediente</label>
								<div style="color:red;">
									{{$errors->first('expediente')}}
								</div>
								<input type="text" class="form-control" id="expediente" name="expediente" value="@if(null !== old('expediente')){{ old('expediente') }}@else{{ $juicio->expediente }}@endif" placeholder="Expediente ...">
								<span class="form-text text-muted">Nº de expediente del juicio</span>
							</div>
							<div class="col-lg-6">
								<label>Tipo de Juicio</label>
								<div style="color:red;" class="error_label" id="error-juiciotipo">
									{{$errors->first('juiciotipo')}}
								</div>
								<select id="juiciotipo" name="juiciotipo" class="form-control">
									<option value="">Seleccione</option>
									@foreach ($juiciotipos as $juiciotip)
										@if (old('juiciotipo') == $juiciotip->id || $juiciotipo->id == $juiciotip->id)
											<option value="{{ $juiciotip->id }}" selected="selected">{{ $juiciotip->juiciotipo }}</option>
										@else
											<option value="{{ $juiciotip->id }}">{{ $juiciotip->juiciotipo }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione el tipo de juicio</span>
							</div>
						</div>
						<div class="form-group row">												
							<div class="col-lg-6">
								<label>Ultima fecha boletín Judicial:</label>
								<div style="color:red;">
									{{$errors->first('ultima_fecha_boletin')}}
								</div>
								<input type="text" class="form-control" id="ultima_fecha_boletin" name="ultima_fecha_boletin" value="@if(null !== old('ultima_fecha_boletin')){{ old('ultima_fecha_boletin') }}@else{{ $juicio->ultima_fecha_boletin }}@endif" placeholder="DD/MM/AAAA">
								<span class="form-text text-muted">Seleccione la fecha del último boletín judicial</span>
							</div>
							<div class="col-lg-6">
								<label>Extracto</label>
								<div style="color:red;">
									{{$errors->first('extracto')}}
								</div>
								<input type="text" class="form-control" id="extracto" name="extracto" value="@if(null !== old('extracto')){{ old('extracto') }}@else{{ $juicio->extracto }}@endif" placeholder="Extracto de boletín judicial...">
								<span class="form-text text-muted">Nº de expediente del juicio</span>
							</div>
						</div>
						<div class="kt-portlet">
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<span class="kt-portlet__head-icon">
										<i class="la la-sticky-note"></i>
									</span>
									<h3 class="kt-portlet__head-title">
										Notas de seguimiento
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<button disabled class="btn btn-sm btn-success agregar-nota-seguimiento">
										<i class="fa fa-plus"></i>
									</button>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="form-group row contenedor_guardar_notas" style="display: none">
									<div class="col-9">
										<input class="form-control" type="text" id="nota_a_agregar" name="nota_a_agregar">
									</div>
									<div class="col-1 kt-align-center">
										<button class="btn btn-sm btn-primary guardar-nota"><i class="fa fa-save"></i></button>
									</div>
									<div class="col-1 kt-align-center">
										<button class="btn btn-sm btn-danger cancelar-nota"><i class="fa fa-times"></i></button>
									</div>
								</div>
								<div class="form-group row cabecera-notas" style="display: @if($notas->count()==0) none @endif;">
									<div class="col-8">
										<label>Nota</label>
									</div>
									<div class="col-3">
										<label>Fecha de creación / Usuario</label>
									</div>
									@role('administrador')
									<div class="col-1">
										<label>Borrar</label>
									</div>
									@endrole
								</div>
								<div class="kt-scroll" data-scroll="true" data-height="200" data-scrollbar-shown="true">
									<div class="contenedor_notas_seguimiento">
										<input type="hidden" id="contador_notas_seguimiento" name="contador_notas_seguimiento" value="{{$notas->count()}}">
										@foreach($notas as $nota)
										<div class="form-group row cloned nota-original">
											<div class="col-8">
												<textarea class="form-control texto-nota-seguimiento-original" type="text" name="notas_seguimiento_original[]" rows="3" @if(!Auth::user()->can("administrar-perfiles")) readonly @endif>{{$nota->nota}}</textarea>
											</div>
											<div class="col-3">
												<div class="row">
													<div class="col-12">
														<input class="form-control fecha-nota-seguimiento" type="text" name="fecha_hora_creada[]" readonly value="{{ \Carbon\Carbon::parse($nota->updated_at)->diffForHumans() }}">
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<input class="form-control usuario-nota-seguimiento" type="text" name="usuario_nota[]" readonly value="{{$nota->user()->first()->name}}">
													</div>
												</div>
											</div>
											@role('administrador')
											<div class="col-1">
												<input type="hidden" class="id-nota-seguimiento" id="id-nota-seguimiento-{{$nota->id}}" name="id-nota-seguimiento[]" value="{{$nota->id}}" />
												<button class="btn btn-sm btn-danger borrar-nota-original"><i class="fa fa-trash"></i></button>
											</div>
											@endrole
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Fecha de próxima acción</label>
								<div style="color:red;">
									{{$errors->first('fecha_proxima_accion')}}
								</div>
								<input type="text" class="form-control" id="fecha_proxima_accion" name="fecha_proxima_accion" value="@if(null !== old('fecha_proxima_accion')){{ old('fecha_proxima_accion') }}@else{{ $juicio->fecha_proxima_accion }}@endif" placeholder="Fecha de próxima acción ...">
								<span class="form-text text-muted">Seleccione la fecha de la próxima acción a ejecutar</span>
							</div>
							<div class="col-lg-6">
								<label>Próxima acción</label>
								<div style="color:red;">
									{{$errors->first('proxima_accion')}}
								</div>
								<textarea class="form-control" rows="5" id="proxima_accion" name="proxima_accion" placeholder="Próxima acción ...">@if(null !== old('proxima_accion')){{ old('proxima_accion') }}@else{{ $juicio->proxima_accion }}@endif</textarea>
								<span class="form-text text-muted">Escriba la próxima acción a ejecutar</span>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-12">
								<hr>
								<h5 class="kt-align-center">Antecedentes / Detalles del juicio</h5>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-3">
								<label>Moneda</label>
								<div style="color:red;">
									{{$errors->first('moneda')}}
								</div>
								<select id="moneda" name="moneda" class="form-control">
									@foreach ($monedas as $moned)
										@if (old('moneda') == $moned->id || $moneda->id == $moned->id)
											<option value="{{ $moned->id }}" selected="selected">{{ $moned->desc_moneda }}</option>
										@else
											<option value="{{ $moned->id }}">{{ $moned->desc_moneda }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione la moneda en la que se maneja la demanda</span>
							</div>
							<div class="col-lg-3">
								<label>Monto demandado</label>
								<div style="color:red;">
									{{$errors->first('monto_demandado')}}
								</div>
								<input type="text" class="form-control" id="monto_demandado" name="monto_demandado" value="@if(null !== old('monto_demandado')){{ old('monto_demandado') }}@else{{ $juicio->monto_demandado }}@endif" placeholder="Monto demandado ...">
								<span class="form-text text-muted">Escriba el monto por el que se está demandando</span>
							</div>
							<div class="col-lg-3">
								<label>Importe del Crédito</label>
								<div style="color:red;">
									{{$errors->first('importe_credito')}}
								</div>
								<input type="text" class="form-control" id="importe_credito" name="importe_credito" value="@if(null !== old('importe_credito')){{ old('importe_credito') }}@else{{ $juicio->importe_credito }}@endif" placeholder="Importe del crédito ...">
								<span class="form-text text-muted">Escriba el importe del crédito</span>
							</div>
							<div class="col-lg-3">
								<label>Macro etapa</label>
								<div style="color:red;" class="error_label" id="error-macroetapa">
									{{$errors->first('macroetapa')}}
								</div>
								<select id="macroetapa" name="macroetapa" class="form-control">
									<option value="">Seleccione</option>
									@foreach ($macroetapas as $macroetap)
										@if (old('macroetapa') == $macroetap->id || $macroetapa->id == $macroetap->id)
											<option value="{{ $macroetap->id }}" selected="selected">{{ $macroetap->macroetapa }}</option>
										@else
											<option value="{{ $macroetap->id }}">{{ $macroetap->macroetapa }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione la etapa general en la que se encuentra el juicio</span>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-4">
								<label>Garantía</label>
								<div style="color:red;">
									{{$errors->first('garantia')}}
								</div>
								<textarea class="form-control" rows="5" id="garantia" name="garantia" placeholder="Garantía ...">@if(null !== old('garantia')){{ old('garantia') }}@else{{ $juicio->garantia }}@endif</textarea>
							</div>
							<div class="col-lg-4">
								<label>Datos de registro público de la propiedads</label>
								<div style="color:red;">
									{{$errors->first('datos_rpp')}}
								</div>
								<textarea class="form-control" rows="5" id="datos_rpp" name="datos_rpp" placeholder="Datos de RPP ...">@if(null !== old('datos_rpp')){{ old('datos_rpp') }}@else{{ $juicio->datos_rpp }}@endif</textarea>
								<span class="form-text text-muted">Escriba los datos de registro público del inmueble</span>
							</div>
							<div class="col-lg-4">
								<label>Otros domicilios</label>
								<div style="color:red;">
									{{$errors->first('otros_domicilios')}}
								</div>
								<textarea class="form-control" rows="5" id="otros_domicilios" name="otros_domicilios" placeholder="Domiciolios ...">@if(null !== old('otros_domicilios')){{ old('otros_domicilios') }}@else{{ $juicio->otros_domicilios }}@endif</textarea>
								<span class="form-text text-muted">Escirba los datos de algún otro domicilio del demandado</span>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-4">
								<label>Procesos asociados</label>
								<div style="color:red;">
									{{$errors->first('procesos_asociados')}}
								</div>
								<input type="text" class="form-control" id="procesos_asociados" name="procesos_asociados" value="@if(null !== old('procesos_asociados')){{ old('procesos_asociados') }}@else{{ $juicio->procesos_asoc }}@endif" placeholder="Procesos asociados ...">
								<span class="form-text text-muted">Escriba procesos asociados al presente juicio</span>
							</div>
							<div class="col-lg-4">
								<label>Sala de Apelación</label>
								<div style="color:red;">
									{{$errors->first('sala_apelacion')}}
								</div>
								<select id="salaapela" name="salaapela" class="form-control">
									@foreach ($salaapelas as $salaapel)
										@if (old('salaapela') == $salaapel->id || $salaapel->id == $salaapela->id)
											<option value="{{ $salaapel->id }}" selected="selected">{{ $salaapel->sala }}</option>
										@else
											<option value="{{ $salaapel->id }}">{{ $salaapel->sala }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione la sala de apelación en la que se encuentra el juicio</span>
							</div>
							<div class="col-lg-4">
								<label>Toca:</label>
								<div style="color:red;">
									{{$errors->first('toca')}}
								</div>
								<input type="text" class="form-control" id="toca" name="toca" value="@if(null !== old('toca')){{ old('toca') }}@else{{ $juicio->toca }}@endif" placeholder="Toca ...">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
								<label>Autoridad Amparo</label>
								<div style="color:red;">
									{{$errors->first('autoridad_amparo')}}
								</div>
								<input type="text" class="form-control" id="autoridad_amparo" name="autoridad_amparo" value="@if(null !== old('autoridad_amparo')){{ old('autoridad_amparo') }}@else{{ $juicio->autoridad_amparo }}@endif" placeholder="Autoridad amparo ...">
							</div>
							<div class="col-lg-6">
								<label>Expediente Amparo</label>
								<div style="color:red;">
									{{$errors->first('expediente_amparo')}}
								</div>
								<input type="text" class="form-control" id="expediente_amparo" name="expediente_amparo" value="@if(null !== old('expediente_amparo')){{ old('expediente_amparo') }}@else{{ $juicio->expediente_amparo }}@endif" placeholder="Expediente amparo ...">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
								<label>Autoridad Recurso de Amparo</label>
								<div style="color:red;">
									{{$errors->first('autoridad_recurso_amparo')}}
								</div>
								<input type="text" class="form-control" id="autoridad_recurso_amparo" name="autoridad_recurso_amparo" value="@if(null !== old('autoridad_recurso_amparo')){{ old('autoridad_recurso_amparo') }}@else{{ $juicio->autoridad_recurso_amparo }}@endif" placeholder="Autoridad Recurso de Amparo ...">
							</div>
							<div class="col-lg-6">
								<label>Expediente Recurso de Amparo</label>
								<div style="color:red;">
									{{$errors->first('expediente_recurso_amparo')}}
								</div>
								<input type="text" class="form-control" id="expediente_recurso_amparo" name="expediente_recurso_amparo" value="@if(null !== old('expediente_recurso_amparo')){{ old('expediente_recurso_amparo') }}@else{{ $juicio->expediente_recurso_amparo }}@endif" placeholder="Expediente Recurso de Amparo ...">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-12">
								<label>Audiencias de juicio</label>
								<div style="color:red;">
									{{$errors->first('audiencia_juicio')}}
								</div>
								<textarea class="form-control" rows="5" id="audiencia_juicio" name="audiencia_juicio" placeholder="Videos de audiencias de juicio ...">@if(null !== old('audiencia_juicio')){{ old('audiencia_juicio') }}@else{{ $juicio->audiencia_juicio }}@endif</textarea>
							</div>
						</div>
					</form>

					<div class="form-group row">
						<div class="col-lg-12">
							<hr>
							<h5 class="kt-align-center">Expediente electrónico</h5>
						</div>
					</div>

					<input type="hidden" id="tipo-doc-uploading" name="tipo-doc-uploading" value="1">

					<div class="form-group row">
						@foreach($doc_tipos as $doc_tipo)
							@if($doc_tipo->id != 3)	
								<div class="col-lg-6 kt-align-center">
									<h5 class="kt-align-center" style="height: 30px">{{ $doc_tipo->tipo }}</h5>
									<div class="row" id="contenedor-agregar-documento-{{ $doc_tipo->id }}" style="display: @if($documentos->contains('doc_tipo_id', $doc_tipo->id)) {{ "none" }} @endif" id="contenedor-boton-agregar-{{ $doc_tipo->id }}" >
										<div class="col-12">										
											<button class="btn btn-sm btn-label-success" id="upload-dialog-{{ $doc_tipo->id }}" onclick="event.preventDefault(); configurarUploader({{ $doc_tipo->id }})"><i class="fa fa-plus"></i>Cargar PDF</button>
											<input type="file" id="pdf-file-{{ $doc_tipo->id }}" name="pdf_file_{{ $doc_tipo->id }}" accept="application/pdf" style="display:none" />
											<div id="pdf-loader-{{ $doc_tipo->id }}" style="display:none">Cargando PDF ..</div>
											<canvas id="pdf-preview-{{ $doc_tipo->id }}" width="210" style="display:none"></canvas>
											<div class="progress" style="display: none">
												<div id="progress-wrp-{{ $doc_tipo->id }}" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
											<br>
											<button class="btn btn-label-danger undo-upload" id="undo-upload-{{ $doc_tipo->id }}" style="display:none"><i class="fa fa-times"></i></button>
										</div>
									</div>
									@foreach($documentos as $documento)
										@if($documento->doc_tipo_id == $doc_tipo->id)
										<div class="row" id="contenedor-a-borrar-doc-{{ $documento->doc_tipo_id }}">
											<div class="modal fade" class="kt_modal_pdf_viewer" id="kt_modal_pdf_viewer_{{ $doc_tipo->id }}" tabindex="-1" role="dialog" aria-labelledby="pdf-viewer-modal" aria-hidden="true">
									            <div class="modal-dialog modal-lg" role="document">
									                <div class="modal-content">
									                    <div class="modal-header">
									                        <h5 class="modal-title" id="agregar_usuario">{{ $doc_tipo->tipo }}</h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                    	<div id="pdf-meta-{{ $documento->doc_tipo_id }}">
																<div id="pdf-buttons-{{ $documento->doc_tipo_id }}">
																	<button id="pdf-prev-{{ $documento->doc_tipo_id }}">Anterior</button>
																	<button id="pdf-next-{{ $documento->doc_tipo_id }}">Siguiente</button>
																</div>	
																<div id="page-count-container-{{ $documento->doc_tipo_id }}">Página <div  style="display: inline-block;" id="pdf-current-page-{{ $documento->doc_tipo_id }}"></div> de <div style="display: inline-block;"  id="pdf-total-pages-{{ $documento->doc_tipo_id }}"></div></div>
															</div>
									                    	<canvas id="pdf-alt-preview-{{ $doc_tipo->id }}" width="750"></canvas>
									                    </div>
									                    <div class="modal-footer">
									                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									                    </div>
									                </div>
									            </div>
									        </div>
											<div class="col-12">
												<div class="row kt-align-center">
													<div class="col-12">
														<a class="btn btn-sm btn-label" target="_blank" href="{{ url("/doc_juicios/".$documento->juicio_id."/".$documento->doc_tipo_id) }}">Descargar Documento</a>
													</div>
													<div class="col-12" id="pdf-main-container-{{ $documento->doc_tipo_id }}">
														<div id="pdf-prev-loader-{{ $documento->doc_tipo_id }}">Cargando documento ...</div>
														<div id="pdf-contents-{{ $documento->doc_tipo_id }}">
															<a data-toggle="modal" data-target="#kt_modal_pdf_viewer_{{ $doc_tipo->id }}"><canvas id="pdf-canvas-{{ $documento->doc_tipo_id }}" width="300"></canvas></a>
															<div id="page-loader-{{ $documento->doc_tipo_id }}">Cargando página ...</div>
														</div>
													</div>
													<div class="col-12" id="contenedor_doc_{{ $documento->doc_tipo_id }}">
														<div id="doc_{{ $documento->doc_tipo_id }}" style="display: none;">{{ url("/doc_juicios_thump/".$documento->juicio_id."/".$documento->doc_tipo_id) }}</div>
													</div>								
												</div>
												<div class="row">
													<div class="col-12">
														<button class="btn btn-sm btn-label-danger borrar-documento" id="juicio_id-{{ $documento->juicio_id }}-doc_tipo_id-{{ $documento->doc_tipo_id }}"><i class="fa fa-times"></i></button>
													</div>											
												</div>
											</div>

										</div>
										@endif
									@endforeach
								</div>
							@endif
						@endforeach
						<div class="col-lg-12 kt-align-center">
							<h5 class="kt-align-center" style="height: 30px">Otros</h5>
							<div class="row" id="contenedor-agregar-documento-3" id="contenedor-boton-agregar-3" >
								<div class="col-12">
									<div class="row">
										<div class="col-12">
											<button class="btn btn-sm btn-label-success" id="upload-dialog-3" onclick="event.preventDefault(); configurarUploader(3)"><i class="fa fa-plus"></i>Agregar Imagen / PDF</button>
											<input type="file" id="pdf-file-3" name="pdf_file_3" accept="image/x-png,image/jpeg,application/pdf" style="display:none" />		
											<div id="pdf-loader-3" style="display:none">Cargando PDF ..</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<canvas id="pdf-preview-3" width="210" style="display:none"></canvas>
											<image id="pdf-image-preview-3" width="210" style="display:none"/>
										</div>
									</div>
									<div class="row">
										<div class="col-5"></div>
										<div class="col-2 kt-align-center">
										<div class="progress" style="display: none">
											<div id="progress-wrp-3" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
										</div>

											<!--<div id="progress-wrp" style="display: none">
											    <div class="progress-bar"></div>
											    <div class="status">0%</div>
											</div>-->
										</div>	
										<div class="col-5"></div>									
									</div>
									<div class="row">
										<div class="col-12">
											<button class="btn btn-label-danger undo-upload" id="undo-upload-3" style="display:none"><i class="fa fa-times"></i></button>
											<button class="btn btn-label-primary upload-file" id="add-uploaded-3" style="display:none"><i class="fa fa-arrow-up"></i></button>	
										</div>
									</div>
								</div>
							</div>
							<div class="row" id="contenedor-a-borrar-doc-3" style="display: @if(!$documentos->contains('doc_tipo_id', 3)) {{ "none" }} @endif" >
								<div class="modal fade" class="kt_modal_pdf_viewer" id="kt_modal_pdf_viewer_3" tabindex="-1" role="dialog" aria-labelledby="pdf-viewer-modal" aria-hidden="true">
						            <div class="modal-dialog modal-lg" role="document">
						                <div class="modal-content">
						                    <div class="modal-header">
						                        <h5 class="modal-title" id="agregar_usuario">3</h5>
						                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                        </button>
						                    </div>
						                    <div class="modal-body">
						                    	<div id="pdf-meta-3">
													<div id="pdf-buttons-3">
														<button id="pdf-prev-3">Anterior</button>
														<button id="pdf-next-3">Siguiente</button>
													</div>	
													<div id="page-count-container-3">Página <div  style="display: inline-block;" id="pdf-current-page-3"></div> de <div style="display: inline-block;"  id="pdf-total-pages-3"></div></div>
												</div>
						                    	<canvas id="pdf-alt-preview-3" width="750"></canvas>
						                    </div>
						                    <div class="modal-footer">
						                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						                    </div>
						                </div>
						            </div>
						        </div>
								<div class="col-12">
									<div class="row kt-align-center">
										<div class="col-12" id="pdf-main-container-3">
											<div id="pdf-prev-loader-3">Cargando documento ...</div>
											<div id="pdf-contents-3">
												<a data-toggle="modal" data-target="#kt_modal_pdf_viewer_3"><canvas id="pdf-canvas-3" width="300"></canvas></a>
												<div id="page-loader-3">Cargando página ...</div>
											</div>
										</div>
										<div class="col-12" id="contenedor_doc_3">
											<div id="doc_3" style="display: none;">{{ url("/doc_juicios_thump/".$juicio->id."/3") }}</div>
										</div>														
										<div class="col-12">
											<a class="btn btn-sm btn-label" target="_blank" href="{{ url("/doc_juicios/". $juicio->id."/3") }}">Descargar Documento</a>
										</div>							
									</div>
									<div class="row">
										<div class="col-12">
											<button class="btn btn-label-danger borrar-documento" id="juicio_id-{{ $juicio->id }}-doc_tipo_id-3"><i class="fa fa-times"></i></button>
										</div>											
									</div>
								</div>
							</div>
						</div>
					</div>				
                </div>
                <div class="form-group row clone" style="display: none;">
					<div class="col-8">
						<textarea rows="3" class="form-control texto-nota-seguimiento" name="notas_seguimiento[]"></textarea>
					</div>
					<div class="col-3">
						<div class="row">
							<div class="col-12">
								<input class="form-control fecha-nota-seguimiento" type="text" name="fecha_hora_creada[]" @if(!Auth::user()->can('administrar-perfiles')) readonly @endif>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<input class="form-control usuario-nota-seguimiento" type="text" name="usuario_nota[]" @if(!Auth::user()->can('administrar-perfiles')) readonly @endif>
							</div>
						</div>
					</div>
					@role('administrador')
					<div class="col-1">
						<input class="id-nota-seguimiento" type="hidden" name="id-nota-seguimiento[]">
						<button class="btn btn-sm btn-danger borrar-nota"><i class="fa fa-trash"></i></button>
					</div>
					@endrole
				</div>
                <div class="kt-portlet__foot kt-align-right">
                	<button class="btn btn-success guardar-juicio">
                		Guardar
                	</button>
                </div>
            </div>
    </div>
</div>

    <!--End::Section-->
@endsection

<!-- Javascript Section -->

@section('scripts')

<script type="text/javascript" src="{{asset('js/Upload.js?v=0.0.18')}}"></script>
@foreach($doc_tipos as $doc_tipo)
	@foreach($documentos as $documento)
		@if($documento->doc_tipo_id == $doc_tipo->id && $documento->doc_tipo_id != 3)
			<script type="text/javascript" src="{{asset('js/showPDFjs_tipo_'.$doc_tipo->id.'.js?v=0.0.18')}}"></script>
		@endif
	@endforeach
@endforeach
<script type="text/javascript" src="{{asset('js/showPDFjs_tipo_3.js?v=0.0.18')}}"></script>
<script type="text/javascript" src="{{asset('js/UploadCreate.js?v=0.0.21')}}"></script>
<script type="text/javascript">

	$(document).ready(function(e){

		$('.kt-scroll').animate({
	            scrollTop: $(".kt-scroll").offset().top
	        }, 200);

		$(".agregar-nota-seguimiento").attr("disabled", false);

		$("#fecha_proxima_accion").datepicker({
			format:"yyyy-mm-dd",
		});
		$("#ultima_fecha_boletin").datepicker({
			format:"yyyy-mm-dd",
		});

		$('#juzgadotipo').change(function(e){
			e.preventDefault();
			var tipojuzgado = $("#juzgadotipo").val();
			if(tipojuzgado != "") {
				$("#juzgado option").show();
				$("#juzgado option[data-id!=" + tipojuzgado + "]").hide();
				$("#juzgado").attr("disabled", false);
			} else {
				$("#juzgado option").show();
				$("#juzgado").attr("disabled", true);
				$("#juzgado").val("");
			}
		});

		$(".undo-upload").click(function(e){
			e.preventDefault();
			var array_undo_upload_id = this.id.split("-");
			var undo_upload_id = array_undo_upload_id[2];
			$("#pdf-file-"+undo_upload_id).val("").hide();
			$("#pdf-preview-"+undo_upload_id).hide().html("");
			$("#undo-upload-"+undo_upload_id).hide();
			$("#upload-dialog-"+undo_upload_id).show();
			$("#pdf-image-preview-"+undo_upload_id).hide();
			if(undo_upload_id == 3) {
				$("#add-uploaded-"+undo_upload_id).hide();
				$("#progress-wrp"+undo_upload_id).parent().hide();
				$("#progress-wrp"+undo_upload_id).css("width", "0%");
				//$("#progress-wrp" + " .progress-bar").css("width", "0%");
	    		//$("#progress-wrp" + " .status").text("0%");
    		}
		});

		$(".upload-file").on("click", function (e) {
			e.preventDefault();
		    var file = $("#pdf-file-3")[0].files[0];
		    var upload = new UploadOtros(file, "{{url('subir_archivo')}}");
		    $("#progress-wrp").parent().show();
		   
		    upload.doUpload();
		});

		$("#monto_demandado").inputmask('decimal', {
            rightAlignNumerics: false
        }); 

        $("#importe_credito").inputmask('decimal', {
            rightAlignNumerics: false
        });

        $(".borrar-documento").click(function(e){
        	e.preventDefault();
        	var array_ids = this.id.split("-");
        	var juicio_id = array_ids[1];
        	var doc_tipo_id = array_ids[3];
        	$.ajax({
                type: "POST",
                data: {
                	juicio_id:juicio_id,
                	doc_tipo_id:doc_tipo_id,
                },
                url: "{{ url('/doc_juicio/deleteDocument') }}",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.operacion) {
                    	$("#contenedor-a-borrar-doc-"+data.doc_tipo_id).remove();
                    	$("#contenedor-agregar-documento-"+data.doc_tipo_id).show();
                    	toastr.success("Se eliminó correctamente el documento", "Eliminar documento");
                    } else {
						toastr.error("Ocurrió un error al intentar eliminar el documento", "Eliminar documento");
                    }
                },
                error: function(data) {
                    console.log(data);
                    toastr.error("Ocurrió un error al intentar eliminar el documento", "Eliminar documento");
                },
            });
        });

        $(".guardar-juicio").click(function(e){
        	e.preventDefault();
			var datosForm = $("#formGuardarJuicio").serialize();
			$.ajax({
                type: "POST",
                data: datosForm,
                url: "{{ url('/juicio/guardarJuicio') }}",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.operacion) {
                    	toastr.success(data.message, data.title);
                    	iniciarCargaArchivos(data.juicio_id, 1);
                    } else {
						toastr.error(data.message, data.title);
                    }
                    $(".error_label").html("");
                    $.each(data.validator, function(i, item){
                    	$("#error-"+i).html(item[0]);
                    });
                },
                error: function(data) {				
                    toastr.error("Ocurrió un error al intentar guardar los datos del juicio", "Carga de Juicio");
                    console.log(data);
                },
            });
        });

        $(".agregar-nota-seguimiento").click(function(e){
        	e.preventDefault();
        	$(".contenedor_guardar_notas").show();
        });

        $(".guardar-nota").click(function(e){
        	e.preventDefault();
			var cant_notas = $("#contador_notas_seguimiento").val();
			var notas = parseInt(cant_notas)+1;
			var texto_nota = $("#nota_a_agregar").val();
			var fecha_nota = new Date(); 
			$(".cabecera-notas").show();
        	$(".clone").clone().appendTo('.contenedor_notas_seguimiento').show().attr("id", "nota-seguimiento-"+notas).removeClass("clone").addClass("cloned");
        	attach_delete();
        	$("#nota-seguimiento-"+notas+" .texto-nota-seguimiento").val(texto_nota);
        	$("#nota-seguimiento-"+notas+" .fecha-nota-seguimiento").val(
        		fecha_nota.getFullYear()+"-"
        		+ ('0' + (fecha_nota.getMonth()+1)).slice(-2)+"-"
        		+ ('0' + fecha_nota.getDate()).slice(-2)+" "
        		+ fecha_nota.getHours() + ":"  
                + fecha_nota.getMinutes() + ":" 
                + fecha_nota.getSeconds());
        	$("#nota-seguimiento-"+notas+" .usuario-nota-seguimiento").val("{{Auth::user()->name}}");

        	$("#contador_notas_seguimiento").val(notas);
        });

        $(".cancelar-nota").click(function(e){
        	e.preventDefault();
        	$(".contenedor_guardar_notas").hide();
        });

        attach_delete();

        $(".borrar-nota-original").click(function(e){
        	e.preventDefault();
        	var nota_id = $(this).siblings(".id-nota-seguimiento").val();
        	var cant_notas = $("#contador_notas_seguimiento").val();
        	$.ajax({
                type: "POST",
                data: {nota_id:nota_id, cant_notas:cant_notas},
                url: "{{ url('/juicio/deleteNote') }}",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.operacion) {
                    	toastr.success(data.message,data.title)
                    	$("#id-nota-seguimiento-"+data.nota_id).closest(".nota-original").remove();
                    	$("#contador_notas_seguimiento").val(data.cant_notas);
                    	if(data.cant_notas == 0) {
				        	$(".cabecera-notas").hide();
				        }
                    } else {
						toastr.error(data.message,data.title)
                    }
                },
                error: function(data) {
                    console.log(data);
                },
            });
        });
	});

	function attach_delete(){
	    $('.borrar-nota').off();
	    $('.borrar-nota').click(function(e){
	        e.preventDefault();
	        var cant_notas = $("#contador_notas_seguimiento").val();
	        var notas = parseInt(cant_notas)-1;
	        $(this).closest('.cloned').remove();
	        $("#contador_notas_seguimiento").val(notas);
	        if(notas == 0) {
	        	$(".cabecera-notas").hide();
	        }
	    });
    }

	function iniciarCargaArchivos(juicio_id, doc_tipo_id){
		var file = $("#pdf-file-"+doc_tipo_id)[0].files[0];
	    if($("#pdf-file-"+doc_tipo_id)[0].files.length > 0) {
		    var upload = new Upload(file, "{{url('upload_doc_juicio')}}", doc_tipo_id, juicio_id);
		    $("#progress-wrp-"+doc_tipo_id).parent().show();
		    // maby check size or type here with upload.getSize() and upload.getType()
		    $("#tipo-doc-uploading").val(doc_tipo_id);
		    // execute upload
		    upload.doUpload();
		} else if (doc_tipo_id < 2){
			iniciarCargaArchivos(juicio_id, parseInt(doc_tipo_id)+1);	
		} else {
			if($("#editar_o_crear").val() == 0) {
				for (var i = 1; i < 3; i++) {
					$("#pdf-file-"+i).val("").hide();
					$("#pdf-preview-"+i).hide().html("");
					$("#undo-upload-"+i).hide();
					$("#upload-dialog-"+i).show();
				}
				toastr.info("Puede proceder a cargar un nuevo juicio", "Juicio cargado exitosamente");
			} else {
				for (var i = 1; i < 3; i++) {
					$("#pdf-file-"+i).val("").hide();
				}

				$(".texto-nota-seguimiento").attr("name", "notas_seguimiento_original[]");
			}
			$(".error_label").html("");
			//$("#formGuardarJuicio").trigger("reset");
		}
	}

	// load the PDF
	function showPDF(pdf_url, _PDF_DOC, _CANVAS, identificador) {

		var _CANVAS_SHOW_PDF = _CANVAS;
		var _PDF_DOC_SHOW_PDF = _PDF_DOC;
		var identificador_SHOW_PDF = identificador

	    pdfjsLib.getDocument({ url: pdf_url }).then(function(pdf_doc) {
	        _PDF_DOC_SHOW_PDF = pdf_doc;

	        // show the first page of PDF
	        showPage(1, _PDF_DOC_SHOW_PDF, _CANVAS_SHOW_PDF, identificador_SHOW_PDF);

	        // destroy previous object url
	        URL.revokeObjectURL(pdf_url);
	    }).catch(function(error) {
	        // error reason
	        alert(error.message);
	    });;
	}

	// show page of PDF
	function showPage(page_no, _PDF_DOC, _CANVAS, identificador) {

		var _CANVAS_SHOW_PAGE = _CANVAS;
		var _PDF_DOC_SHOW_PAGE = _PDF_DOC;
		var identificador_SHOW_PAGE = identificador

	    _PDF_DOC_SHOW_PAGE.getPage(page_no).then(function(page){
	        // set the scale of viewport
	        var scale_required = _CANVAS_SHOW_PAGE.width / page.getViewport(1).width;

	        // get viewport of the page at required scale
	        var viewport = page.getViewport(scale_required);

	        // set canvas height
	        _CANVAS_SHOW_PAGE.height = viewport.height;

	        var renderContext = {
	            canvasContext: _CANVAS_SHOW_PAGE.getContext('2d'),
	            viewport: viewport
	        };

	        var identificador_SHOW_PAGE_render = identificador_SHOW_PAGE;
	        
	        // render the page contents in the canvas
	        page.render(renderContext).then(function() {
	            document.querySelector("#pdf-preview-"+identificador_SHOW_PAGE_render).style.display = 'inline-block';
	            document.querySelector("#undo-upload-"+identificador_SHOW_PAGE_render).style.display = 'inline-block';
	            if(identificador_SHOW_PAGE_render == 3)
	            document.querySelector("#add-uploaded-"+identificador_SHOW_PAGE_render).style.display = 'inline-block';
	            document.querySelector("#pdf-loader-"+identificador_SHOW_PAGE_render).style.display = 'none';
	        });
	    });
	}

	function configurarUploader(id) {

		var identificador = id;

		// will hold the PDF handle returned by PDF.JS API
		var _PDF_DOC;

		// PDF.JS renders PDF in a <canvas> element
		var _CANVAS = document.querySelector('#pdf-preview-'+identificador);

		// will hold object url of chosen PDF
		var _OBJECT_URL;


		document.querySelector("#pdf-file-"+identificador).click();
		
		/* when users selects a file */
		document.querySelector("#pdf-file-"+identificador).addEventListener('change', function() {
		    // user selected PDF
		    var file = this.files[0];

		    // allowed MIME types
		    var mime_types = [ 'application/pdf' ];
		    
			const lastDot = file.name.lastIndexOf('.');
			const ext = file.name.substring(lastDot + 1);

			var reader = new FileReader();
		    
		    reader.readAsDataURL(file);

		    if((ext == 'jpg' || ext == 'png') && identificador == 3) {

		    	document.querySelector("#pdf-image-preview-"+identificador).style.display = 'inline-block';
	            document.querySelector("#undo-upload-"+identificador).style.display = 'inline-block';
	            document.querySelector("#add-uploaded-"+identificador).style.display = 'inline-block';
	            document.querySelector("#pdf-loader-"+identificador).style.display = 'none';
	            document.querySelector("#upload-dialog-"+identificador).style.display = 'none';
			    reader.onload = function(e) {
			      $('#pdf-image-preview-'+identificador).attr('src', e.target.result);
			    }
		    } else {

			    // validate whether PDF
			    if(mime_types.indexOf(file.type) == -1) {
			        alert('Error : Incorrect file type');
			        return;
			    }
			    // validate file size
			    if(file.size > 128*1024*1024) {
			        alert('Error : Exceeded size 128MB');
			        return;
			    }

			    // validation is successful

			    // hide upload dialog
			    document.querySelector("#upload-dialog-"+identificador).style.display = 'none';
			    
			    // show the PDF preview loader
			    document.querySelector("#pdf-loader-"+identificador).style.display = 'inline-block';

			    // object url of PDF 
			    _OBJECT_URL = URL.createObjectURL(file)

			    // send the object url of the pdf to the PDF preview function
			    showPDF(_OBJECT_URL, _PDF_DOC, _CANVAS, identificador);
		    }
		});

	}

	submitted = false;

 	$("form").submit(function() {
    	submitted = true;
    });

	$(window).bind('beforeunload', function(){
	  	if (!submitted) {
            var message = "Es posible que los cambios no se guarden", e = e || window.event;
            if (e) {
                e.returnValue = message;
            }
        return message;
    	}
	});

</script>

@endsection
