@extends('layouts.general.app')

@section('content')

<!--Begin::Section-->
<div class="row">
    <div class="col-xl-8">
    	<form class="kt-form" action="{{ url('juicio/guardarJuicio') }}" method="POST" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="editar_o_crear" value="1">
    		<input type="hidden" name="juicio_id" value="{{ $juicio->id }}">
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
                        <button class="btn btn-success" type="submit">
	                		Guardar
	                	</button>
                    </div>
                </div>
                <div class="kt-portlet__body">
                	
                	<div class="form-group row">
                		<div class="col-lg-6">
							<label>Estado</label>
							<div style="color:red;">
								{{$errors->first('estado')}}
							</div>
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
						</div>
						<div class="col-lg-6">
							<label>Cliente</label>
							<div style="color:red;">
								{{$errors->first('cliente')}}
							</div>
							<select id="cliente" name="cliente" class="form-control" @role("colaborador") readonly @endrole>
								<option value="">Seleccione</option>
								@foreach ($clientes as $client)
									@if (old('cliente') == $client->id || $cliente->user_id == $client->user_id)
										<option value="{{ $client->id }}" selected="selected">{{ $client->name }}</option>
									@else
										<option value="{{ $client->id }}">{{ $client->name }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione el cliente asociado a este juicio</span>
						</div>						
					</div>
                	<div class="form-group row">
                		<div class="col-lg-6">
							<label>Colaborador</label>
							<div style="color:red;">
								{{$errors->first('colaborator')}}
							</div>
							<select id="colaborator" name="colaborator" class="form-control" @role("colaborador") readonly @endrole>
								<option value="">Seleccione</option>
								@foreach ($colaborators as $colaborat)
									@if (old('colaborator') == $colaborat->id || $colaborator->id )
										<option value="{{ $colaborat->id }}" selected="selected">{{ $colaborat->name }}</option>
									@else
										<option value="{{ $colaborat->id }}">{{ $colaborat->name }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione al colaborador responsable de este juicio</span>
						</div>
						<div class="col-lg-6">
							<label>Información de contacto del cliente</label>
							<div style="color:red;">
								{{$errors->first('cliente_contact_info')}}
							</div>
							<input type="text" class="form-control" id="cliente_contact_info" name="cliente_contact_info" value="@if(null !== old('cliente_contact_info')){{ old('cliente_contact_info') }}@else{{ $juicio->cliente_contact_info }}@endif" placeholder="Información de contacto ...">
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
										<div style="color:red;">
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
										<div style="color:red;">
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
						<div class="col-lg-6">
							<label>Tipo de Juzgado</label>
							<div style="color:red;">
								{{$errors->first('juzgadotipo')}}
							</div>
							<select id="juzgadotipo" name="juzgadotipo" class="form-control">
								<option value="">Seleccione</option>
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
						<div class="col-lg-6">
							<label>Juzgado</label>
							<div style="color:red;">
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
							<div style="color:red;">
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
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Notas de seguimiento</label>
							<div style="color:red;">
								{{$errors->first('notas_seguimiento')}}
							</div>
							<textarea class="form-control" rows="5" id="notas_seguimiento" name="notas_seguimiento" placeholder="Notas de seguimiento ...">@if(null !== old('notas_seguimiento')){{ old('notas_seguimiento') }}@else{{ $juicio->notas_seguimiento }}@endif</textarea>
							<span class="form-text text-muted">Escriba las acciones ejecutadas para realizar seguimiento al juicio</span>
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
								<option value="">Seleccione</option>
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
							<div style="color:red;">
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
							<textarea class="form-control" rows="5" id="garantia" name="garantia" placeholder="Garantía ...">@if(null !== old('garantia')){{ old('garantia') }}@endif</textarea>
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
							<input type="text" class="form-control" id="procesos_asociados" name="procesos_asociados" value="@if(null !== old('procesos_asociados')){{ old('procesos_asociados') }}@else{{ $juicio->procesos_asociados }}@endif" placeholder="Procesos asociados ...">
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

					<div class="form-group row">
						<div class="col-lg-12">
							<hr>
							<h5 class="kt-align-center">Expediente electrónico</h5>
						</div>
					</div>

					<div class="form-group row">
						@foreach($doc_tipos as $doc_tipo)
							<div class="col-lg-4 kt-align-center">
								<h5 class="kt-align-center" style="height: 30px">{{ $doc_tipo->tipo }}</h5>
								<div class="row" id="contenedor-agregar-documento-{{ $doc_tipo->id }}" style="display: @if($documentos->contains('doc_tipo_id', $doc_tipo->id)) {{ "none" }} @endif" id="contenedor-boton-agregar-{{ $doc_tipo->id }}" >
									<div class="col-12">										
										<button class="btn btn-label-success" id="upload-dialog-{{ $doc_tipo->id }}" onclick="event.preventDefault(); configurarUploader({{ $doc_tipo->id }})"><i class="fa fa-plus"></i>Cargar PDF</button>
										<input type="file" id="pdf-file-{{ $doc_tipo->id }}" name="pdf_file_{{ $doc_tipo->id }}" accept="application/pdf" style="display:none" />
										<div id="pdf-loader-{{ $doc_tipo->id }}" style="display:none">Cargando PDF ..</div>
										<canvas id="pdf-preview-{{ $doc_tipo->id }}" width="210" style="display:none"></canvas>
										<br>
										<button class="btn btn-label-danger undo-upload" id="undo-upload-{{ $doc_tipo->id }}" style="display:none"><i class="fa fa-times"></i></button>
									</div>
								</div>
								@foreach($documentos as $documento)
									@if($documento->doc_tipo_id == $doc_tipo->id)
								<div class="row" id="contenedor-a-borrar-doc-{{ $documento->id }}">
									<div class="col-12">
										<div class="row kt-align-center">
											<div class="col-12" id="contenedor_doc_{{ $documento->id }}">
												<div id="doc_{{ $documento->id }}" style="display: none;">{{ url("/doc_juicios/".$documento->juicio_id."/".$documento->doc_tipo_id) }}</div>
											</div>								
										</div>
										<div class="row">
											<div class="col-12">
												<button class="btn btn-label-danger borrar-documento" id="doc_id-{{ $documento->id }}-juicio_id-{{ $documento->juicio_id }}-doc_tipo_id-{{ $documento->doc_tipo_id }}"><i class="fa fa-times"></i></button>
											</div>											
										</div>
									</div>
								</div>
									@endif
								@endforeach
							</div>
						@endforeach
					</div>					
                </div>
                <div class="kt-portlet__foot kt-align-right">
                	<button class="btn btn-success" type="submit">
                		Guardar
                	</button>
                </div>
            </div>
        <form>
    </div>
</div>

    <!--End::Section-->
@endsection

<!-- Javascript Section -->

@section('scripts')

<script type="text/javascript" src="{{asset('js/datatables/juicios-html.js')}}"></script>
<script type="text/javascript">

	$(document).ready(function(e){
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
        	var doc_id = array_ids[1];
        	var juicio_id = array_ids[3];
        	var doc_tipo_id = array_ids[5];
        	$.ajax({
                type: "POST",
                data: {
                	doc_id:doc_id,
                	juicio_id:juicio_id,
                	doc_tipo_id:doc_tipo_id,
                },
                url: "{{ url('/doc_juicio/deleteDocument') }}",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.operacion) {
                    	$("#contenedor-a-borrar-doc-"+data.doc_id).remove();
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
	});

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
		});

	}

	function makeThumb(page) {
	  // draw page to fit into 96x96 canvas
	  var vp = page.getViewport(1);
	  var canvas = document.createElement("canvas");
	  canvas.width = canvas.height = 300;
	  var scale = Math.min(canvas.width / vp.width, canvas.height / vp.height);
	  return page.render({canvasContext: canvas.getContext("2d"), viewport: page.getViewport(scale)}).promise.then(function () {
	    return canvas;
	  });
	}

	function generarThumpnail(doc, doc_juicio, doc_tipo) {

		var doc_juicio_id = doc_juicio;
		var doc_tipo_id = doc_tipo;
		var doc_id = doc;
		var archivo = document.getElementById("doc_"+doc_id).innerHTML;

		pdfjsLib.getDocument(archivo).promise.then(function (doc) {
		  var pages = [1]; //while (pages.length < doc.numPages) pages.push(pages.length + 1);
		  var doc_id_interno = doc_id;
		  var doc_juicio_id_interno = doc_juicio_id;
		  var doc_tipo_id_interno = doc_tipo_id;


		  return Promise.all(pages.map(function (num) {
		    // create a div for each page and build a small canvas for it
		    var div = document.getElementById('contenedor_doc_'+doc_id_interno);
		    return doc.getPage(num).then(makeThumb)
		      .then(function (canvas) {
		      	var vinculo = document.createElement("a");
		      	if(doc_tipo_id_interno == 1) {
		      		vinculo.href = "{{ url('doc_juicios') }}/"+doc_juicio_id_interno+"/fundatorios-"+doc_juicio_id_interno+".pdf";
		      	} else if(doc_tipo_id_interno == 2) {
		      		vinculo.href = "{{ url('doc_juicios') }}/"+doc_juicio_id_interno+"/expediente-"+doc_juicio_id_interno+".pdf";
		      	} else {
		      		vinculo.href = "{{ url('doc_juicios') }}/"+doc_juicio_id_interno+"/otros-"+doc_juicio_id_interno+".pdf";
		      	}
		      	
		        div.appendChild(vinculo);
		        vinculo.appendChild(canvas);
		    });
		  }));
		}).catch(console.error);

	}

	@foreach($doc_tipos as $doc_tipo)
		@foreach($documentos as $documento)
			@if($documento->doc_tipo_id == $doc_tipo->id)
			generarThumpnail({{$documento->id}}, {{$documento->juicio_id}}, {{$documento->doc_tipo_id}});
			@endif
		@endforeach
	@endforeach

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
