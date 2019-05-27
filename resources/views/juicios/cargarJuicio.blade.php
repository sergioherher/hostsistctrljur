@extends('layouts.general.app')

@section('content')
<style type="text/css">
	.file-upload {
	  background-color: #ffffff;
	  width: 100%;
	  margin: 0 auto;
	  padding: 20px;
	}

	.file-upload-btn {
	  width: 100%;
	  margin: 0;
	  color: #fff;
	  background: #34bfa3;
	  border: none;
	  padding: 10px;
	  border-radius: 4px;
	  border-bottom: 2px solid #22b9ff;
	  transition: all .2s ease;
	  outline: none;
	  font-weight: 700;
	}

	.file-upload-btn:hover {
	  background: #22b9ff;
	  color: #ffffff;
	  transition: all .2s ease;
	  cursor: pointer;
	}

	.file-upload-btn:active {
	  border: 0;
	  transition: all .2s ease;
	}

	.file-upload-content {
	  display: none;
	  text-align: center;
	}

	.file-upload-input {
	  position: absolute;
	  margin: 0;
	  padding: 0;
	  width: 100%;
	  height: 100%;
	  outline: none;
	  opacity: 0;
	  cursor: pointer;
	}

	.file-upload-image {
	  max-height: 200px;
	  max-width: 200px;
	  margin: auto;
	  padding: 20px;
	}

	.remove-image {
	  width: 200px;
	  margin: 0;
	  color: #fff;
	  background: #cd4535;
	  border: none;
	  padding: 10px;
	  border-radius: 4px;
	  border-bottom: 4px solid #b02818;
	  transition: all .2s ease;
	  outline: none;
	  text-transform: uppercase;
	  font-weight: 700;
	}

	.remove-image:hover {
	  background: #c13b2a;
	  color: #ffffff;
	  transition: all .2s ease;
	  cursor: pointer;
	}

	.remove-image:active {
	  border: 0;
	  transition: all .2s ease;
	}
</style>
<!--Begin::Section-->
    <div class="row">
        <div class="col-xl-8">
            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Cargar Juicio
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                	<div class="form-group row">
						<div class="col-lg-6">
							<label>Cliente</label>
							<div style="color:red;">
								{{$errors->first('cliente')}}
							</div>
							<select id="cliente" name="cliente" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($clientes as $cliente)
									@if (old('cliente') == $cliente->id)
										<option value="{{ $cliente->id }}" selected="selected">{{ $cliente->name }}</option>
									@else
										<option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione el cliente asociado a este juicio</span>
						</div>
						<div class="col-lg-6">
							<label>Colaborador</label>
							<div style="color:red;">
								{{$errors->first('colaborator')}}
							</div>
							<select id="colaborator" name="colaborator" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($colaborators as $colaborator)
									@if (old('colaborator') == $colaborator->id)
										<option value="{{ $colaborator->id }}" selected="selected">{{ $colaborator->name }}</option>
									@else
										<option value="{{ $colaborator->id }}">{{ $colaborator->name }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione al colaborador responsable de este juicio</span>
						</div>
					</div>
                	<div class="form-group row">
						<div class="col-lg-6">
							<label>Información de contacto del cliente</label>
							<div style="color:red;">
								{{$errors->first('cliente_contact_info')}}
							</div>
							<input type="text" class="form-control" id="cliente_contact_info" name="cliente_contact_info" value="@if(null !== old('cliente_contact_info')){{ old('cliente_contact_info') }}@endif" placeholder="Información de contacto ...">
							<span class="form-text text-muted">Escriba información adicional de contacto del cliente</span>
						</div>
						<div class="col-lg-6">
							
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Número de Crédito</label>
							<div style="color:red;">
								{{$errors->first('numero_credito')}}
							</div>
							<input type="text" class="form-control" id="numero_credito" name="numero_credito" value="@if(null !== old('numero_credito')){{ old('numero_credito') }}@endif" placeholder="Nº Crédito ...">
							<span class="form-text text-muted">Escriba el nombre del demandado en este juicio</span>
						</div>
						<div class="col-lg-6">
							<label>Demandado</label>
							<div style="color:red;">
								{{$errors->first('demandado')}}
							</div>
							<input type="text" class="form-control" id="demandado" name="demandado" value="@if(null !== old('demandado')){{ old('demandado') }}@endif" placeholder="Demandado...">
							<span class="form-text text-muted">Escriba el nombre del codemandado en este juicio</span>
							<label>Codemandado</label>
							<div style="color:red;">
								{{$errors->first('codemandado')}}
							</div>
							<input type="text" class="form-control" id="codemandado" name="codemandado" value="@if(null !== old('codemandado')){{ old('codemandado') }}@endif" placeholder="Codemandado...">
							<span class="form-text text-muted">Escriba el nombre del codemandado en este juicio</span>
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
								@foreach ($juzgadotipos as $juzgadotipo)
									@if (old('juzgadotipo') == $juzgadotipo->id)
										<option value="{{ $juzgadotipo->id }}" selected="selected">{{ $juzgadotipo->juztipo }}</option>
									@else
										<option value="{{ $juzgadotipo->id }}">{{ $juzgadotipo->juztipo }}</option>
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
							<select id="juzgado" name="juzgado" class="form-control" disabled>
								<option value="">Seleccione</option>
								@foreach ($juzgados as $juzgado)
									@if (old('juzgado') == $juzgado->id)
										<option value="{{ $juzgado->id }}" data-id="{{ $juzgado->juzgadotipo_id }}" selected="selected">{{ $juzgado->juzgado }}</option>
									@else
										<option value="{{ $juzgado->id }}" data-id="{{ $juzgado->juzgadotipo_id }}" >{{ $juzgado->juzgado }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Para habilitar este campo debe seleccionar primero un tipo de juzgado</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Tipo de Juicio</label>
							<div style="color:red;">
								{{$errors->first('juiciotipo')}}
							</div>
							<select id="juiciotipo" name="juiciotipo" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($juiciotipos as $juiciotipo)
									@if (old('juiciotipo') == $juiciotipo->id)
										<option value="{{ $juiciotipo->id }}" selected="selected">{{ $juiciotipo->juiciotipo }}</option>
									@else
										<option value="{{ $juiciotipo->id }}">{{ $juiciotipo->juiciotipo }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione el tipo de juicio</span>
						</div>
						<div class="col-lg-6">
							<label>Expediente</label>
							<div style="color:red;">
								{{$errors->first('expediente')}}
							</div>
							<input type="text" class="form-control" id="expediente" name="expediente" value="@if(null !== old('expediente')){{ old('expediente') }}@endif" placeholder="Expediente ...">
							<span class="form-text text-muted">Nº de expediente del juicio</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Notas de seguimiento</label>
							<div style="color:red;">
								{{$errors->first('notas_seguimiento')}}
							</div>
							<textarea class="form-control" rows="5" id="notas_seguimiento" name="notas_seguimiento" placeholder="Notas de seguimiento ...">@if(null !== old('notas_seguimiento')){{ old('notas_seguimiento') }}@endif</textarea>
							<span class="form-text text-muted">Escriba las acciones ejecutadas para realizar seguimiento al juicio</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Fecha de próxima acción</label>
							<div style="color:red;">
								{{$errors->first('fecha_proxima_accion')}}
							</div>
							<input type="text" class="form-control" id="fecha_proxima_accion" name="fecha_proxima_accion" value="@if(null !== old('fecha_proxima_accion')){{ old('fecha_proxima_accion') }}@endif" placeholder="Fecha de próxima acción ...">
							<span class="form-text text-muted">Seleccione la fecha de la próxima acción a ejecutar</span>
						</div>
						<div class="col-lg-6">
							<label>Próxima acción</label>
							<div style="color:red;">
								{{$errors->first('proxima_accion')}}
							</div>
							<textarea class="form-control" rows="5" id="proxima_accion" name="proxima_accion" placeholder="Próxima acción ...">@if(null !== old('proxima_accion')){{ old('proxima_accion') }}@endif</textarea>
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
						<div class="col-lg-4">
							<label>Monto demandado</label>
							<div style="color:red;">
								{{$errors->first('monto_demandado')}}
							</div>
							<input type="text" class="form-control" id="monto_demandado" name="monto_demandado" value="@if(null !== old('monto_demandado')){{ old('monto_demandado') }}@endif" placeholder="Monto demandado ...">
							<span class="form-text text-muted">Escriba el monto por el que se está demandando</span>
						</div>
						<div class="col-lg-4">
							<label>Importe del Crédito</label>
							<div style="color:red;">
								{{$errors->first('importe_credito')}}
							</div>
							<input type="text" class="form-control" id="importe_credito" name="importe_credito" value="@if(null !== old('importe_credito')){{ old('importe_credito') }}@endif" placeholder="Importe del crédito ...">
							<span class="form-text text-muted">Escriba el importe del crédito</span>
						</div>
						<div class="col-lg-4">
							<label>Macro etapa</label>
							<div style="color:red;">
								{{$errors->first('macroetapa')}}
							</div>
							<select id="macroetapa" name="macroetapa" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($macroetapas as $macroetap)
									@if (old('macroetapa') == $macroetap->id)
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
						<div class="col-lg-6">
							<label>Datos de registro público de la propiedads</label>
							<div style="color:red;">
								{{$errors->first('datos_rpp')}}
							</div>
							<input type="text" class="form-control" id="datos_rpp" name="datos_rpp" value="@if(null !== old('datos_rpp')){{ old('datos_rpp') }}@endif" placeholder="Datos de RPP ...">
							<span class="form-text text-muted">Escriba los datos de registro público del inmueble</span>
						</div>
						<div class="col-lg-6">
							<label>Otros domicilios</label>
							<div style="color:red;">
								{{$errors->first('otros_domicilios')}}
							</div>
							<textarea class="form-control" rows="5" id="otros_domicilios" name="otros_domicilios" placeholder="Domiciolios ...">@if(null !== old('otros_domicilios')){{ old('otros_domicilios') }}@endif</textarea>
							<span class="form-text text-muted">Escirba los datos de algún otro domicilio del demandado</span>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Procesos asociados</label>
							<div style="color:red;">
								{{$errors->first('procesos_asociados')}}
							</div>
							<input type="text" class="form-control" id="procesos_asociados" name="procesos_asociados" value="@if(null !== old('procesos_asociados')){{ old('procesos_asociados') }}@endif" placeholder="Procesos asociados ...">
							<span class="form-text text-muted">Escriba procesos asociados al presente juicio</span>
						</div>
						<div class="col-lg-4">
							<label>Sala de Apelación</label>
							<div style="color:red;">
								{{$errors->first('sala_apelacion')}}
							</div>
							<select id="salaapela" name="salaapela" class="form-control">
								@foreach ($salaapelas as $salaapela)
									@if (old('salaapela') == $salaapela->id)
										<option value="{{ $salaapela->id }}" selected="selected">{{ $salaapela->sala }}</option>
									@else
										<option value="{{ $salaapela->id }}">{{ $salaapela->sala }}</option>
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
							<input type="text" class="form-control" id="toca" name="toca" value="@if(null !== old('toca')){{ old('toca') }}@endif" placeholder="Toca ...">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Autoridad Amparo</label>
							<div style="color:red;">
								{{$errors->first('autoridad_amparo')}}
							</div>
							<input type="text" class="form-control" id="autoridad_amparo" name="autoridad_amparo" value="@if(null !== old('autoridad_amparo')){{ old('autoridad_amparo') }}@endif" placeholder="Autoridad amparo ...">
						</div>
						<div class="col-lg-6">
							<label>Expediente Amparo</label>
							<div style="color:red;">
								{{$errors->first('expediente_amparo')}}
							</div>
							<input type="text" class="form-control" id="expediente_amparo" name="expediente_amparo" value="@if(null !== old('expediente_amparo')){{ old('expediente_amparo') }}@endif" placeholder="Expediente amparo ...">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Autoridad Recurso de Amparo</label>
							<div style="color:red;">
								{{$errors->first('autoridad_recurso_amparo')}}
							</div>
							<input type="text" class="form-control" id="autoridad_recurso_amparo" name="autoridad_recurso_amparo" value="@if(null !== old('autoridad_recurso_amparo')){{ old('autoridad_recurso_amparo') }}@endif" placeholder="Autoridad Recurso de Amparo ...">
						</div>
						<div class="col-lg-6">
							<label>Expediente Recurso de Amparo</label>
							<div style="color:red;">
								{{$errors->first('expediente_recurso_amparo')}}
							</div>
							<input type="text" class="form-control" id="expediente_recurso_amparo" name="expediente_recurso_amparo" value="@if(null !== old('expediente_recurso_amparo')){{ old('expediente_recurso_amparo') }}@endif" placeholder="Expediente Recurso de Amparo ...">
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
							<div class="col-lg-4">
								<h6 class="kt-align-center">{{ $doc_tipo->tipo }}</h6>
								<div class="file-upload">
									<button class="file-upload-btn" type="button" onclick="$('#file-upload-input-{{ $doc_tipo->id }}').trigger( 'click' )">Cargar Documento</button>

									<div class="image-upload-wrap">
										<input class="file-upload-input" id="file-upload-input-{{ $doc_tipo->id }}" type='file' onchange="readURL(this);" accept="application/pdf" style="display: none;" />
									</div>
									<div class="file-upload-content" id="file-upload-content-{{ $doc_tipo->id }}">
									    <img data-pdf-thumbnail-file="" class="file-upload-image" id="file-upload-image-{{ $doc_tipo->id }}" src="#" alt="your image" />
									    <div class="image-title-wrap" id="image-title-wrap-{{ $doc_tipo->id }}">
									      <button type="button" class="remove-image" id="remove-image-{{ $doc_tipo->id }}" onclick="event.preventDefault(); removeUpload(this);">Eliminar <span class="image-title" id="image-title-{{ $doc_tipo->id }}">Imagen cargada</span></button>
									    </div>
									</div>
								</div>
							</div>
						@endforeach
					</div>

					
                </div>
            </div>
        </div>
    </div>

    <!--End::Section-->
@endsection

<!-- Javascript Section -->

@section('scripts')

<script type="text/javascript" src="{{asset('js/datatables/juicios-html.js')}}"></script>
<script type="text/javascript">

	function readURL(input) {

		var array_id = input.id.split('-');
		var id = array_id[3];

		if (input.files && input.files[0]) {

		    var reader = new FileReader();

		    reader.onload = function(e) {
				$('#file-upload-image-'+id).attr('data-pdf-thumbnail-file', e.target.result);
				$('#file-upload-content-'+id).show();
				$('#image-title-'+id).html(input.files[0].name);
		    };

		    reader.readAsDataURL(input.files[0]);

		  } else {
		    removeUpload($("#remove-image-"+id));
		  }
	}

	function removeUpload(boton) {
		alert(boton.id);
		var array_id = boton.id.split('-');
		var id = array_id[2];
	  	$('#file-upload-input-'+id).replaceWith($('#file-upload-input-'+id).clone());
	  	$('#file-upload-content-'+id).hide();
	}

	$(document).ready(function(e){
		$("#fecha_proxima_accion").datepicker();
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
	});
</script>

@endsection
