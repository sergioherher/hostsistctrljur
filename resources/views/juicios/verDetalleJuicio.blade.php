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
                            Juicio {{ $juicio->expediente }} - Demandado: 
                            @foreach($demandados as $key => $demandado) 
                            	@if($demandado->codemandado == 0)
                            		{{ $demandado->name }}
                            	@endif
							@endforeach
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
							<input autofocus type="text" class="form-control" id="cliente" name="cliente" value="@if(null !== old('cliente')){{ old('cliente') }}@else{{ $cliente->name }}@endif" placeholder="Nombre de cliente ...">
							<input type="hidden" name="cliente_id" value="">
							<span class="form-text text-muted">Si desea agregar el cliente a la base de datos seleccione la opción añadir</span>
						</div>
						<div class="col-lg-6">
							<label>Interno</label>
							<div style="color:red;">
								{{$errors->first('colaborator')}}
							</div>
							<select id="colaborator" name="colaborator" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($colaborators as $colaborat)
									@if (old('colaborat') == $colaborat->id || $colaborator->id == $colaborat->id)
										<option value="{{ $colaborat->name }}" selected="selected">{{ $colaborat->name }}</option>
									@else
										<option value="{{ $colaborat->name }}">{{ $colaborat->name }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione al colaborador responsable de este juicio</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Número de Crédito</label>
							<div style="color:red;">
								{{$errors->first('numero_credito')}}
							</div>
							<input type="text" class="form-control" id="numero_credito" name="numero_credito" value="@if(null !== old('numero_credito')){{ old('numero_credito') }}@else{{ $juicio->numero_credito }}@endif" placeholder="Nº Crédito ...">
							<span class="form-text text-muted">Escriba el nombre del demandado en este juicio</span>
						</div>
						<div class="col-lg-6">
							@foreach($demandados as $key => $demandado)
							<label>@if($demandado->codemandado == 1) Codemandado @else Demandado @endif</label>
							<div style="color:red;">
								{{$errors->first('intern')}}
							</div>
							<input type="text" class="form-control" id="demandados[]" name="demandados[]" value="@if(null !== old('demandado')){{ old('demandado') }}@else{{ $demandado->name }}@endif" placeholder="Nº Crédito ...">
							<span class="form-text text-muted">Escriba el nombre del codemandado en este juicio</span>
							@endforeach
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-4">
							<label>Juzgado</label>
							<div style="color:red;">
								{{$errors->first('juzgado')}}
							</div>
							<select id="juzgado" name="juzgado" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($juzgados as $juzga)
									@if (old('juzgado') == $juzga->id || $juzgado->id == $juzga->id)
										<option value="{{ $juzga->id }}" selected="selected">{{ $juzga->juzgado }}</option>
									@else
										<option value="{{ $juzga->id }}">{{ $juzga->juzgado }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione el juzgado donde se desarrolla el juicio</span>
						</div>
						<div class="col-lg-4">
							<label>Tipo de Juicio</label>
							<div style="color:red;">
								{{$errors->first('juiciotipo')}}
							</div>
							<select id="juiciotipo" name="juiciotipo" class="form-control">
								<option value="">Seleccione</option>
								@foreach ($juiciotipos as $juiciotip)
									@if (old('juiciotip') == $juiciotip->id || $juiciotipo->id == $juiciotip->id)
										<option value="{{ $juiciotip->id }}" selected="selected">{{ $juiciotip->juztipo }}</option>
									@else
										<option value="{{ $juiciotip->id }}">{{ $juiciotip->juztipo }}</option>
									@endif
								@endforeach
							</select>
							<span class="form-text text-muted">Seleccione el juzgado donde se desarrolla el juicio</span>
						</div>
						<div class="col-lg-4">
							<label>Expediente</label>
							<div style="color:red;">
								{{$errors->first('juzgado')}}
							</div>
							<input type="text" class="form-control" id="expediente" name="expediente" value="@if(null !== old('expediente')){{ old('expediente') }}@else{{ $juicio->expediente }}@endif" placeholder="Expediente ...">
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
							<textarea class="form-control" rows="5" id="notas_seguimiento" name="notas_seguimiento" placeholder="Próxima acción ...">@if(null !== old('proxima_accion')){{ old('proxima_accion') }}@else{{ $juicio->proxima_accion }}@endif</textarea>
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
							<input type="text" class="form-control" id="monto_demandado" name="monto_demandado" value="@if(null !== old('monto_demandado')){{ old('monto_demandado') }}@else{{ $juicio->monto_demandado }}@endif" placeholder="Monto demandado ...">
							<span class="form-text text-muted">Escriba el monto por el que se está demandando</span>
						</div>
						<div class="col-lg-4">
							<label>Importe del Crédito</label>
							<div style="color:red;">
								{{$errors->first('importe_credito')}}
							</div>
							<input type="text" class="form-control" id="importe_credito" name="importe_credito" value="@if(null !== old('importe_credito')){{ old('importe_credito') }}@else{{ $juicio->importe_credito }}@endif" placeholder="Importe del crédito ...">
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
						<div class="col-lg-6">
							<label>Datos de registro público de la propiedads</label>
							<div style="color:red;">
								{{$errors->first('datos_rpp')}}
							</div>
							<input type="text" class="form-control" id="datos_rpp" name="datos_rpp" value="@if(null !== old('datos_rpp')){{ old('datos_rpp') }}@else{{ $juicio->datos_rpp }}@endif" placeholder="Datos de RPP ...">
							<span class="form-text text-muted">Escriba los datos de registro público del inmueble</span>
						</div>
						<div class="col-lg-6">
							<label>Otros domicilios</label>
							<div style="color:red;">
								{{$errors->first('otros_domicilios')}}
							</div>
							<textarea class="form-control" rows="5" id="otros_domicilios" name="otros_domicilios" placeholder="Domiciolios ...">@if(null !== old('otros_domicilios')){{ old('otros_domicilios') }}@else{{ $juicio->otros_domicilios }}@endif</textarea>
							<span class="form-text text-muted">Escirba los datos de algún otro domicilio del demandado</span>
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
										<input class="file-upload-input" id="file-upload-input-{{ $doc_tipo->id }}" type='file' onchange="readURL(this);" accept="pdf/*" style="display: none;" />
									</div>
									<div class="file-upload-content" id="file-upload-content-{{ $doc_tipo->id }}">
									    <img class="file-upload-image" id="file-upload-image-{{ $doc_tipo->id }}" src="#" alt="your image" />
									    <div class="image-title-wrap" id="image-title-wrap-{{ $doc_tipo->id }}">
									      <button type="button" class="remove-image" id="remove-image-{{ $doc_tipo->id }}" onclick="event.preventDefault(); removeUpload(this);">Eliminar <span class="image-title" id="image-title-{{ $doc_tipo->id }}">Imagen cargada</span></button>
									    </div>
									</div>
								</div>
								@foreach($documentos as $documento)
									@if($documento->doc_tipo_id == $doc_tipo->id)
									<div class="row">
										<div class="col-12">
											<a href="{{ $documento->ruta_archivo }}">{{ $documento->ruta_archivo }}</a>
										</div>
									</div>
									@endif
								@endforeach
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
				$('#file-upload-image-'+id).attr('src', e.target.result);
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
	});
</script>

@endsection
