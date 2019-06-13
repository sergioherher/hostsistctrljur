@extends('layouts.general.app')

@section('content')

<!--Begin::Section-->
<div class="row">
    <div class="col-xl-8">
            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--break-sm">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Cargar Juicio
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <button class="btn btn-success guardar-juicio">
	                		Guardar
	                	</button>
                    </div>
                </div>
                <div class="kt-portlet__body">                	
			    	<form class="kt-form" id="formGuardarJuicio" name="guardarJuicio" action="{{ url('juicio/guardarJuicio') }}" method="POST" enctype="multipart/form-data">
			    		@csrf
			    		<input type="hidden" name="editar_o_crear" value="0">
	                	@if(Auth::user()->can('administrar-perfiles'))
	                	<div class="form-group row">                    		
	                		<div class="col-lg-6">	
	                			<label>Coordinador</label>							
								<div style="color:red;" class="error_label" id="error-coordinador"></div>
								<select id="coordinador" name="coordinador" class="form-control">
									<option value="">Seleccione</option>
									@foreach ($coordinadores as $coordinad)
										@if (old('estado') == $coordinad->id)
											<option value="{{ $coordinad->id }}" selected="selected">{{ $coordinad->name }}</option>
										@else
											<option value="{{ $coordinad->id }}">{{ $coordinad->name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div> 
	                	@else
	                	<input type="hidden" name="coordinador" value="{{Auth::user()->id}}">
	                	@endif
	                	<div class="form-group row">
	                		<div class="col-lg-6">
								<label>Estado</label>
								<div style="color:red;" class="error_label" id="error-estado"></div>
								<select id="estado" name="estado" class="form-control">
									<option value="">Seleccione</option>
									@foreach ($estados as $estado)
										@if (old('estado') == $estado->id)
											<option value="{{ $estado->id }}" selected="selected">{{ $estado->estado }}</option>
										@else
											<option value="{{ $estado->id }}">{{ $estado->estado }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione el estado en el que se encuentra el juicio</span>
							</div>
							<div class="col-lg-6">
								<label>Cliente</label>
								<div style="color:red;" class="error_label" id="error-cliente">
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
						</div>
	                	<div class="form-group row">
	                		<div class="col-lg-6">
								<label>Colaborador</label>
								<div style="color:red;" class="error_label" id="error-colaborator">
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
							<div class="col-lg-6">
								<label>Información de contacto del cliente</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('user_contact_info')}}
								</div>
								<input type="text" class="form-control" id="user_contact_info" name="user_contact_info" value="@if(null !== old('user_contact_info')){{ old('user_contact_info') }}@endif" placeholder="Información de contacto ...">
								<span class="form-text text-muted">Escriba información adicional de contacto del cliente</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Número de Crédito</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('numero_credito')}}
								</div>
								<input type="text" class="form-control" id="numero_credito" name="numero_credito" value="@if(null !== old('numero_credito')){{ old('numero_credito') }}@endif" placeholder="Nº Crédito ...">
								<span class="form-text text-muted">Escriba el numero de crédito de ser el caso</span>
							</div>
							<div class="col-lg-6">
								<label>Demandado</label>
								<div style="color:red;" class="error_label" id="error-demandado"></div>
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
								<div style="color:red;" class="error_label" id="error-juzgadotipo">
									{{$errors->first('juzgadotipo')}}
								</div>
								<select id="juzgadotipo" name="juzgadotipo" class="form-control">
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
								<div style="color:red;" class="error_label" id="error-juzgado">
									{{$errors->first('juzgado')}}
								</div>
								<select id="juzgado" name="juzgado" class="form-control">
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
								<label>Expediente</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('expediente')}}
								</div>
								<input type="text" class="form-control" id="expediente" name="expediente" value="@if(null !== old('expediente')){{ old('expediente') }}@endif" placeholder="Expediente ...">
								<span class="form-text text-muted">Nº de expediente del juicio</span>
							</div>
							<div class="col-lg-6">
								<label>Tipo de Juicio</label>
								<div style="color:red;" class="error_label" id="error-juiciotipo">
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
						</div>
						<div class="form-group row">												
							<div class="col-lg-6">
								<label>Ultima fecha boletín Judicial:</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('ultima_fecha_boletin')}}
								</div>
								<input type="text" class="form-control" id="ultima_fecha_boletin" name="ultima_fecha_boletin" value="@if(null !== old('ultima_fecha_boletin')){{ old('ultima_fecha_boletin') }}@endif" placeholder="DD/MM/AAAA">
								<span class="form-text text-muted">Seleccione la fecha del último boletín judicial</span>
							</div>
							<div class="col-lg-6">
								<label>Extracto</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('extracto')}}
								</div>
								<input type="text" class="form-control" id="extracto" name="extracto" value="@if(null !== old('extracto')){{ old('extracto') }}@endif" placeholder="Extracto de boletín judicial...">
								<span class="form-text text-muted">Nº de expediente del juicio</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-12">
								<label>Notas de seguimiento</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('notas_seguimiento')}}
								</div>
								<textarea class="form-control" rows="5" id="notas_seguimiento" name="notas_seguimiento" placeholder="Notas de seguimiento ...">@if(null !== old('notas_seguimiento')){{ old('notas_seguimiento') }}@endif</textarea>
								<span class="form-text text-muted">Escriba las acciones ejecutadas para realizar seguimiento al juicio</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Fecha de próxima acción</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('fecha_proxima_accion')}}
								</div>
								<input type="text" class="form-control" id="fecha_proxima_accion" name="fecha_proxima_accion" value="@if(null !== old('fecha_proxima_accion')){{ old('fecha_proxima_accion') }}@endif" placeholder="Fecha de próxima acción ...">
								<span class="form-text text-muted">Seleccione la fecha de la próxima acción a ejecutar</span>
							</div>
							<div class="col-lg-6">
								<label>Próxima acción</label>
								<div style="color:red;" class="error_label">
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
							<div class="col-lg-3">
								<label>Moneda</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('moneda')}}
								</div>
								<select id="moneda" name="moneda" class="form-control">
									@foreach ($monedas as $moneda)
										@if (old('moneda') == $moneda->id)
											<option value="{{ $moneda->id }}" selected="selected">{{ $moneda->desc_moneda }}</option>
										@else
											<option value="{{ $moneda->id }}">{{ $moneda->desc_moneda }}</option>
										@endif
									@endforeach
								</select>
								<span class="form-text text-muted">Seleccione la moneda en la que se maneja la demanda</span>
							</div>
							<div class="col-lg-3">
								<label>Monto demandado</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('monto_demandado')}}
								</div>
								<input type="text" class="form-control" id="monto_demandado" name="monto_demandado" value="@if(null !== old('monto_demandado')){{ old('monto_demandado') }}@endif" placeholder="Monto demandado ...">
								<span class="form-text text-muted">Escriba el monto por el que se está demandando</span>
							</div>
							<div class="col-lg-3">
								<label>Importe del Crédito</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('importe_credito')}}
								</div>
								<input type="text" class="form-control" id="importe_credito" name="importe_credito" value="@if(null !== old('importe_credito')){{ old('importe_credito') }}@endif" placeholder="Importe del crédito ...">
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
							<div class="col-lg-4">
								<label>Garantía</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('garantia')}}
								</div>
								<textarea class="form-control" rows="5" id="garantia" name="garantia" placeholder="Garantía ...">@if(null !== old('garantia')){{ old('garantia') }}@endif</textarea>
							</div>
							<div class="col-lg-4">
								<label>Datos de registro público de la propiedads</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('datos_rpp')}}
								</div>
								<textarea class="form-control" rows="5" id="datos_rpp" name="datos_rpp" placeholder="Datos de RPP ...">@if(null !== old('datos_rpp')){{ old('datos_rpp') }}@endif</textarea>
								<span class="form-text text-muted">Escriba los datos de registro público del inmueble</span>
							</div>
							<div class="col-lg-4">
								<label>Otros domicilios</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('otros_domicilios')}}
								</div>
								<textarea class="form-control" rows="5" id="otros_domicilios" name="otros_domicilios" placeholder="Domiciolios ...">@if(null !== old('otros_domicilios')){{ old('otros_domicilios') }}@endif</textarea>
								<span class="form-text text-muted">Escirba los datos de algún otro domicilio del demandado</span>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-4">
								<label>Procesos asociados</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('procesos_asociados')}}
								</div>
								<input type="text" class="form-control" id="procesos_asociados" name="procesos_asociados" value="@if(null !== old('procesos_asociados')){{ old('procesos_asociados') }}@endif" placeholder="Procesos asociados ...">
								<span class="form-text text-muted">Escriba procesos asociados al presente juicio</span>
							</div>
							<div class="col-lg-4">
								<label>Sala de Apelación</label>
								<div style="color:red;" class="error_label">
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
								<div style="color:red;" class="error_label">
									{{$errors->first('autoridad_amparo')}}
								</div>
								<input type="text" class="form-control" id="autoridad_amparo" name="autoridad_amparo" value="@if(null !== old('autoridad_amparo')){{ old('autoridad_amparo') }}@endif" placeholder="Autoridad amparo ...">
							</div>
							<div class="col-lg-6">
								<label>Expediente Amparo</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('expediente_amparo')}}
								</div>
								<input type="text" class="form-control" id="expediente_amparo" name="expediente_amparo" value="@if(null !== old('expediente_amparo')){{ old('expediente_amparo') }}@endif" placeholder="Expediente amparo ...">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
								<label>Autoridad Recurso de Amparo</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('autoridad_recurso_amparo')}}
								</div>
								<input type="text" class="form-control" id="autoridad_recurso_amparo" name="autoridad_recurso_amparo" value="@if(null !== old('autoridad_recurso_amparo')){{ old('autoridad_recurso_amparo') }}@endif" placeholder="Autoridad Recurso de Amparo ...">
							</div>
							<div class="col-lg-6">
								<label>Expediente Recurso de Amparo</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('expediente_recurso_amparo')}}
								</div>
								<input type="text" class="form-control" id="expediente_recurso_amparo" name="expediente_recurso_amparo" value="@if(null !== old('expediente_recurso_amparo')){{ old('expediente_recurso_amparo') }}@endif" placeholder="Expediente Recurso de Amparo ...">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-12">
								<label>Audiencias de juicio</label>
								<div style="color:red;" class="error_label">
									{{$errors->first('audiencia_juicio')}}
								</div>
								<textarea class="form-control" rows="5" id="audiencia_juicio" name="audiencia_juicio" placeholder="Videos de audiencias de juicio ...">@if(null !== old('audiencia_juicio')){{ old('audiencia_juicio') }}@endif</textarea>
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
						<div class="col-lg-4 kt-align-center">
							<h5 class="kt-align-center" style="height: 30px">{{ $doc_tipo->tipo }}</h5>
							<button class="btn btn-label-success" id="upload-dialog-{{ $doc_tipo->id }}" onclick="event.preventDefault(); configurarUploader({{ $doc_tipo->id }})"><i class="fa fa-plus"></i>Cargar PDF</button>
							<input type="file" id="pdf-file-{{ $doc_tipo->id }}" name="pdf_file_{{ $doc_tipo->id }}" accept="application/pdf" style="display:none" />
							<div id="pdf-loader-{{ $doc_tipo->id }}" style="display:none">Cargando PDF ..</div>
							<canvas id="pdf-preview-{{ $doc_tipo->id }}" width="150" style="display:none"></canvas>
							<br>
							<div class="progress" style="display: none">
								<div id="progress-wrp-{{ $doc_tipo->id }}" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
							</div>
							<button class="btn btn-label-danger undo-upload" id="undo-upload-{{ $doc_tipo->id }}" style="display:none"><i class="fa fa-times"></i> Deshacer</button>
						</div>
					@endforeach
				</div>					
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
<script type="text/javascript" src="{{asset('js/UploadCreate.js?v=0.0.17')}}"></script>
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
                    result = JSON.parse(data);					
                    toastr.error("Ocurrió un error al intentar guardar los datos del juicio", "Carga de Juicio");
                },
            });
        });        
	});

	function iniciarCargaArchivos(juicio_id, doc_tipo_id){
		var file = $("#pdf-file-"+doc_tipo_id)[0].files[0];
	    if($("#pdf-file-"+doc_tipo_id)[0].files.length > 0) {
		    var upload = new Upload(file, "{{url('upload_doc_juicio')}}", doc_tipo_id, juicio_id);
		    $("#progress-wrp-"+doc_tipo_id).parent().show();
		    // maby check size or type here with upload.getSize() and upload.getType()
		    $("#tipo-doc-uploading").val(doc_tipo_id);
		    // execute upload
		    upload.doUpload();
		} else if (doc_tipo_id < 3){
			iniciarCargaArchivos(juicio_id, parseInt(doc_tipo_id)+1);
			for (var i = 1; i < 4; i++) {
				$("#pdf-file-"+i).val("").hide();
				$("#pdf-preview-"+i).hide().html("");
				$("#undo-upload-"+i).hide();
				$("#upload-dialog-"+i).show();
			}
			$(".error_label").html("");
			$("#formGuardarJuicio").trigger("reset");
			toastr.info("Puede proceder a cargar un nuevo juicio", "Juicio cargado exitosamente");
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
