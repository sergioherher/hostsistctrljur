<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Colaborator, App\Juzgado, App\Juiciotipo, App\Macroetapa, App\DocTipo, App\User, App\Estado, App\Salaapela, App\Juzgadotipo, App\Juiciouser, App\Demandado, App\DocJuicio, App\Moneda, App\Nota;
use App\Oficio, App\JuiciosOficio;
use Validator, Mail, Auth;
use App\Traits\MpdfTrait;
use Illuminate\Support\Facades\Storage;
use App\Exports\JuiciosExport;
use Maatwebsite\Excel\Facades\Excel;
use \stdClass;
use \Session;

class JuiciosController extends Controller
{
    use MpdfTrait;
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
    public function detalleJuicio($juicio_id)
    {
        $juicio  = Juicio::where('id', $juicio_id)->first();
        $juzgado = Juicio::find($juicio_id)->juzgado()->first();
        $juzgadotipo = Juicio::find($juicio_id)->juzgadotipo()->first();
        $juiciotipo = Juicio::find($juicio_id)->juiciotipo()->first();
        $juiciousers = Juicio::find($juicio_id)->juiciousers()->get();
        $macroetapa = Juicio::find($juicio_id)->macroetapa()->first();
        $demandados = Juicio::find($juicio_id)->demandados()->get();
        $documentos = Juicio::find($juicio_id)->doc_juicios()->get();
        $notas = Juicio::find($juicio_id)->notas()->get();
        $estado = Juicio::find($juicio_id)->estado()->first();
        $salaapela = Juicio::find($juicio_id)->salaapela()->first();
        $moneda = Juicio::find($juicio_id)->moneda()->first();
        $juicios_oficios = Juicio::find($juicio_id)->juicios_oficios()->get();
        $sentencia = Juicio::find($juicio_id)->sentencia()->first();

        $dictamenes = $sentencia->sentencias_dictamenes()->get();

        $salaapelas = Salaapela::all();
        $juzgadotipos = Juzgadotipo::all();
        $estados = Estado::all();
        $juzgados = Juzgado::all();
        $juiciotipos = Juiciotipo::all();
        $macroetapas = Macroetapa::all();
        $doc_tipos = DocTipo::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'colaborador');
        })->withTrashed()->get();

        $clientes = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'cliente');
        })->withTrashed()->get();

        $coordinadores = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'coordinador');
        })->withTrashed()->get();

        foreach ($juiciousers as $juiciouser) {
          if ($juiciouser->role_id == 2) {
            $coordinador = $juiciouser->user()->withTrashed()->first();
          }
          elseif($juiciouser->role_id == 3) {
            $colaborator = $juiciouser->user()->withTrashed()->first();
          }
          elseif($juiciouser->role_id == 4) {
            $cliente = $juiciouser;
          }
        }

        $monedas = Moneda::all();
        $oficios = Oficio::all();

        return view('juicios.verDetalleJuicio')->with('juicio', $juicio)
                                               ->with('moneda', $moneda)
                                               ->with('monedas', $monedas)
                                               ->with('estado', $estado)
                                               ->with('estados', $estados)
                                               ->with('colaborators', $users)
                                               ->with('colaborator', $colaborator)
                                               ->with('juzgado', $juzgado)
                                               ->with('juzgados', $juzgados)
                                               ->with('juzgadotipos', $juzgadotipos)
                                               ->with('juzgadotipo', $juzgadotipo)
                                               ->with('juiciotipo', $juiciotipo)
                                               ->with('juiciotipos', $juiciotipos)
                                               ->with('cliente', $cliente)
                                               ->with('clientes', $clientes)
                                               ->with('macroetapa', $macroetapa)
                                               ->with('macroetapas', $macroetapas)
                                               ->with('demandados', $demandados)
                                               ->with('documentos', $documentos)
                                               ->with('doc_tipos', $doc_tipos)
                                               ->with('salaapelas', $salaapelas)
                                               ->with('coordinadores', $coordinadores)
                                               ->with('coordinador', $coordinador)
                                               ->with('salaapela', $salaapela)
                                               ->with('notas', $notas)
                                               ->with('oficios', $oficios)
                                               ->with('juicios_oficios', $juicios_oficios)
                                               ->with('sentencia', $sentencia)
                                               ->with('dictamenes', $dictamenes);
    }

    /**
     * Muestra el detalle de un juicio
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cargarJuicio()
    {
        $estados = Estado::all();
        $juzgados = Juzgado::all();
        $juiciotipos = Juiciotipo::all();
        $macroetapas = Macroetapa::all();
        $doc_tipos = DocTipo::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'colaborador');
        })->get();

        $clientes = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'cliente');
        })->get();

        $coordinadores = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'coordinador');
        })->get();

        $salaapelas = Salaapela::all();
        $juzgadotipos = Juzgadotipo::all();
        $monedas = Moneda::all();
        $oficios = Oficio::all();

        return view('juicios.cargarJuicio')->with('estados', $estados)
                                           ->with('colaborators', $users)
                                           ->with('juzgados', $juzgados)
                                           ->with('juiciotipos', $juiciotipos)
                                           ->with('macroetapas', $macroetapas)
                                           ->with('clientes', $clientes)
                                           ->with('doc_tipos', $doc_tipos)
                                           ->with('juzgadotipos',$juzgadotipos)
                                           ->with('salaapelas',$salaapelas)
                                           ->with('coordinadores', $coordinadores)
                                           ->with('monedas', $monedas)
                                           ->with('oficios', $oficios);
    }

    public function exportarExcel() {

        $user = \Auth::user();

        return Excel::download(new JuiciosExport($user), 'juicios.xlsx');

    }

    public function guardarJuicio(Request $request)
    {
        $messages = [
            'required'    => 'Este campo es requerido',
            'min'         => 'Ingrese al menos :min caracteres',
            'max'         => 'Ingrese hasta :max caracteres',
            'unique'      => 'El valor de este campo ya existe, elija uno diferente',
            'email'       => 'Ingrese una dirección de correo válida',
            'integer'     => 'Ingrese solo números',
            'required_if' => 'Este campo es requerido.'
        ];

        $rules = [
                  'estado'            => 'required',
                  'coordinador'       => 'required',
                  'cliente'           => 'required',
                  'colaborator'       => 'required',
                  'demandado'         => 'required',
                  'juiciotipo'        => 'required',
                  'macroetapa'        => 'required',
                  'salaapela'         => 'required',
                  'juzgadotipo'       => 'required',
                  'juzgado'       => 'required',
              ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return json_encode(array('validator' => $validator->errors(), 'operacion' => false, 'message' => "Hay un error en la validación del formulario, por favor verifique los campos requeridos", 'title' => 'Validacion de Formulario'));

        } else {

            $notas = $request->input("notas_seguimiento");
            $notas_originales = $request->input("notas_seguimiento_original");
            $id_notas_originales = $request->input("id-nota-seguimiento");
            $contador_notas_seguimiento = $request->input("contador_notas_seguimiento");

            $contador_oficios_localizacion = $request->input("contador_oficios_localizacion");
            $oficio_localizacion_id = $request->input("oficio_localizacion_id");
            $oficio_loc_recibido = $request->input("oficio_loc_recibido");
            $oficio_loc_entregado = $request->input("oficio_loc_entregado");
            $oficio_loc_contestado = $request->input("oficio_loc_contestado");
            $oficio_loc_record_recibido = $request->input("oficio_loc_record_recibido");
            $oficio_loc_record_entregado = $request->input("oficio_loc_record_entregado");
            $oficio_loc_record_contestado = $request->input("oficio_loc_record_contestado");
            $oficios_loc_da_domicilio = $request->input("oficios_loc_da_domicilio_hidden");
            $oficios_loc_domicilio_dado = $request->input("oficios_loc_domicilio_dado");
            $oficios_loc_domicilio_habilitado = $request->input("oficios_loc_domicilio_habilitado_hidden");
            $oficios_loc_diligenciado = $request->input("oficios_loc_diligenciado_hidden");
            $oficio_loc_fecha_diligencia = $request->input("oficio_loc_fecha_diligencia");
            $oficio_loc_resultado_diligencia = $request->input("oficio_loc_resultado_diligencia");

            $original_oficio_localizacion_id = $request->input("original_oficio_localizacion_id");
            $original_juicio_oficio_id = $request->input("original_juicio_oficio_id");
            $original_oficio_loc_recibido = $request->input("original_oficio_loc_recibido");
            $original_oficio_loc_entregado = $request->input("original_oficio_loc_entregado");
            $original_oficio_loc_contestado = $request->input("original_oficio_loc_contestado");
            $original_oficio_loc_record_recibido = $request->input("original_oficio_loc_record_recibido");
            $original_oficio_loc_record_entregado = $request->input("original_oficio_loc_record_entregado");
            $original_oficio_loc_record_contestado = $request->input("original_oficio_loc_record_contestado");
            $original_oficios_loc_da_domicilio = $request->input("original_oficios_loc_da_domicilio_hidden");
            $original_oficios_loc_domicilio_dado = $request->input("original_oficios_loc_domicilio_dado");
            $original_oficios_loc_domicilio_habilitado = $request->input("original_oficios_loc_domicilio_habilitado_hidden");
            $original_oficios_loc_diligenciado = $request->input("original_oficios_loc_diligenciado_hidden");
            $original_oficio_loc_fecha_diligencia = $request->input("original_oficio_loc_fecha_diligencia");
            $original_oficio_loc_resultado_diligencia = $request->input("original_oficio_loc_resultado_diligencia");

            $estado = $request->input("estado");
            $portafolio = $request->input("portafolio");
            $coordinador = $request->input("coordinador");
            $cliente = $request->input("cliente");
            $colaborador = $request->input("colaborator");
            $user_contact_info = $request->input("user_contact_info");
            $numero_credito = $request->input("numero_credito");
            $meta_legal = $request->input("meta_legal");
            $demandado_name = $request->input("demandado");
            $codemandado_name = $request->input("codemandado");
            $juzgadotipo = $request->input("juzgadotipo");
            $juzgado = $request->input("juzgado");
            $juiciotipo = $request->input("juiciotipo");
            $ultima_fecha_boletin = $request->input("ultima_fecha_boletin");
            $extracto = $request->input("extracto");
            $expediente = $request->input("expediente");
            $fecha_proxima_accion = $request->input("fecha_proxima_accion");
            $proxima_accion = $request->input("proxima_accion");
            $monto_demandado = $request->input("monto_demandado");
            $importe_credito = $request->input("importe_credito");
            $macroetapa = $request->input("macroetapa");
            $garantia = $request->input("garantia");
            $datos_rpp = $request->input("datos_rpp");
            $otros_domicilios = $request->input("otros_domicilios");
            $procesos_asociados = $request->input("procesos_asociados");
            $salaapela = $request->input("salaapela");
            $toca = $request->input("toca");
            $autoridad_amparo = $request->input("autoridad_amparo");
            $expediente_amparo = $request->input("expediente_amparo");
            $autoridad_recurso_amparo = $request->input("autoridad_recurso_amparo");
            $expediente_recurso_amparo = $request->input("expediente_recurso_amparo");
            $audiencia_juicio = $request->input("audiencia_juicio");
            $moneda = $request->input("moneda");

            $editar_o_crear = $request->input("editar_o_crear");

            $user_cliente = User::where("id",$cliente)->first();
            $user_colaborador = User::where("id",$colaborador)->first();
            $user_coordinador = User::where("id",$coordinador)->first();

            try {

              if($editar_o_crear == 0) {

                $juicio = new Juicio;
                $juicio->estado_id = $estado;
                $juicio->portafolio = $portafolio;
                $juicio->numero_credito = $numero_credito;
                $juicio->meta_legal = $meta_legal;
                $juicio->juzgado_id = $juzgado;
                $juicio->juzgadotipo_id = $juzgadotipo;
                $juicio->expediente = $expediente;
                $juicio->juiciotipo_id = $juiciotipo;
                $juicio->ultima_fecha_boletin = $ultima_fecha_boletin;
                $juicio->extracto = $extracto;
                $juicio->expediente= $expediente;
                $juicio->fecha_proxima_accion = $fecha_proxima_accion;
                $juicio->proxima_accion = $proxima_accion;
                $juicio->monto_demandado = $monto_demandado;
                $juicio->importe_credito = $importe_credito;
                $juicio->macroetapa_id = $macroetapa;
                $juicio->garantia = $garantia;
                $juicio->datos_rpp = $datos_rpp;
                $juicio->otros_domicilios = $otros_domicilios;
                $juicio->procesos_asoc = $procesos_asociados;
                $juicio->salaapela_id = $salaapela;
                $juicio->toca = $toca;
                $juicio->autoridad_amparo = $autoridad_amparo;
                $juicio->expediente_amparo = $expediente_amparo;
                $juicio->autoridad_recurso_amparo = $autoridad_recurso_amparo;
                $juicio->expediente_recurso_amparo = $expediente_recurso_amparo;
                $juicio->audiencia_juicio = $audiencia_juicio;
                $juicio->moneda_id = $moneda;
                $juicio->save();

                if(!empty($notas)) {
                  foreach ($notas as $nota) {
                    $nota_to_save = new Nota;
                    $nota_to_save->nota = $nota;
                    $nota_to_save->juicio_id = $juicio->id;
                    $nota_to_save->user_id = Auth::user()->id;
                    $nota_to_save->save();
                  }
                }

                if(!empty($oficio_localizacion_id)) {
                  foreach ($oficio_localizacion_id as $key => $oficio) {
                    $oficio_to_save = new JuiciosOficio;
                    $oficio_to_save->juicio_id = $juicio->id;
                    $oficio_to_save->oficio_id = $oficio;
                    $oficio_to_save->recibido = $oficio_loc_recibido[$key];
                    $oficio_to_save->entregado = $oficio_loc_entregado[$key];
                    $oficio_to_save->contestado = $oficio_loc_contestado[$key];
                    $oficio_to_save->recordatorio_recibido = $oficio_loc_record_recibido[$key];
                    $oficio_to_save->recordatorio_entregado = $oficio_loc_record_entregado[$key];
                    $oficio_to_save->recordatorio_contestado = $oficio_loc_record_contestado[$key];
                    $oficio_to_save->da_domicilio = $oficios_loc_da_domicilio[$key];
                    $oficio_to_save->domicilio_dado = $oficios_loc_domicilio_dado[$key];
                    $oficio_to_save->domicilio_habilitado_autos = $oficios_loc_domicilio_habilitado[$key];
                    $oficio_to_save->diligenciado = $oficios_loc_diligenciado[$key];
                    $oficio_to_save->fecha_diligencia = $oficio_loc_fecha_diligencia[$key];
                    $oficio_to_save->resultado_diligencia = $oficio_loc_resultado_diligencia[$key];
                    $oficio_to_save->save();
                  }
                }

                $juiciousuario_cliente = new Juiciouser;
                $juiciousuario_cliente->juicio_id = $juicio->id;
                $juiciousuario_cliente->user_id = $cliente;
                $juiciousuario_cliente->user_name = $user_cliente->name;
                $juiciousuario_cliente->user_contact_info = $user_contact_info;
                $juiciousuario_cliente->role_id = 4;
                $juiciousuario_cliente->save();

                $juiciousuario_colaborador = new Juiciouser;
                $juiciousuario_colaborador->juicio_id = $juicio->id;
                $juiciousuario_colaborador->user_id = $colaborador;
                $juiciousuario_colaborador->user_name = $user_colaborador->name;
                $juiciousuario_colaborador->role_id = 3;
                $juiciousuario_colaborador->save();

                $juiciousuario_coordinador = new Juiciouser;
                $juiciousuario_coordinador->juicio_id = $juicio->id;
                $juiciousuario_coordinador->user_id = $coordinador;
                $juiciousuario_coordinador->user_name = $user_coordinador->name;
                $juiciousuario_coordinador->role_id = 2;
                $juiciousuario_coordinador->save();

                $demandado = new Demandado;
                $demandado->juicio_id = $juicio->id;
                $demandado->name = $demandado_name;
                $demandado->codemandado = 0;
                $demandado->save();

                if($codemandado_name != "") {
                    $codemandado = new Demandado;
                    $codemandado->juicio_id = $juicio->id;
                    $codemandado->name = $codemandado_name;
                    $codemandado->codemandado = 1;
                    $codemandado->save();
                }

                $resultado = array('operacion' => true, 'message' => "Juicio creado exitosamente", 'title' => 'Creación de Juicio', 'juicio_id' => $juicio->id);

              } else {

                $juicio_id = $request->input("juicio_id");

                $juicio = Juicio::where("id", $juicio_id)->first();
                $juicio->estado_id = $estado;
                $juicio->portafolio = $portafolio;
                $juicio->numero_credito = $numero_credito;
                $juicio->meta_legal = $meta_legal;
                $juicio->juzgado_id = $juzgado;
                $juicio->juzgadotipo_id = $juzgadotipo;
                $juicio->expediente = $expediente;
                $juicio->juiciotipo_id = $juiciotipo;
                $juicio->ultima_fecha_boletin = $ultima_fecha_boletin;
                $juicio->extracto = $extracto;
                $juicio->expediente= $expediente;
                $juicio->fecha_proxima_accion = $fecha_proxima_accion;
                $juicio->proxima_accion = $proxima_accion;
                $juicio->monto_demandado = $monto_demandado;
                $juicio->importe_credito = $importe_credito;
                $juicio->macroetapa_id = $macroetapa;
                $juicio->garantia = $garantia;
                $juicio->datos_rpp = $datos_rpp;
                $juicio->otros_domicilios = $otros_domicilios;
                $juicio->procesos_asoc = $procesos_asociados;
                $juicio->salaapela_id = $salaapela;
                $juicio->toca = $toca;
                $juicio->autoridad_amparo = $autoridad_amparo;
                $juicio->expediente_amparo = $expediente_amparo;
                $juicio->autoridad_recurso_amparo = $autoridad_recurso_amparo;
                $juicio->expediente_recurso_amparo = $expediente_recurso_amparo;
                $juicio->audiencia_juicio = $audiencia_juicio;
                $juicio->moneda_id = $moneda;
                $juicio->save();

                if(!empty($notas_originales) && Auth::user()->hasRole('administrador')) {
                  foreach ($notas_originales as $key => $nota_original) {
                    $nota_original_id = $id_notas_originales[$key];
                    $nota_to_update = Nota::where("id",$nota_original_id)->first();
                    $nota_to_update->nota = $nota_original;
                    $nota_to_update->save();
                  }
                }

                if(!empty($original_oficio_localizacion_id)) {
                  foreach ($original_oficio_localizacion_id as $key => $oficio) {
                    $oficio_to_save = JuiciosOficio::where("id", $original_juicio_oficio_id[$key])->first();
                    $oficio_to_save->recibido = $original_oficio_loc_recibido[$key];
                    $oficio_to_save->entregado = $original_oficio_loc_entregado[$key];
                    $oficio_to_save->contestado = $original_oficio_loc_contestado[$key];
                    $oficio_to_save->recordatorio_recibido = $original_oficio_loc_record_recibido[$key];
                    $oficio_to_save->recordatorio_entregado = $original_oficio_loc_record_entregado[$key];
                    $oficio_to_save->recordatorio_contestado = $original_oficio_loc_record_contestado[$key];
                    $oficio_to_save->da_domicilio = $original_oficios_loc_da_domicilio[$key];
                    $oficio_to_save->domicilio_dado = $original_oficios_loc_domicilio_dado[$key];
                    $oficio_to_save->domicilio_habilitado_autos = $original_oficios_loc_domicilio_habilitado[$key];
                    $oficio_to_save->diligenciado = $original_oficios_loc_diligenciado[$key];
                    $oficio_to_save->fecha_diligencia = $original_oficio_loc_fecha_diligencia[$key];
                    $oficio_to_save->resultado_diligencia = $original_oficio_loc_resultado_diligencia[$key];
                    $oficio_to_save->save();
                  }
                }

                if(!empty($oficio_localizacion_id)) {
                  foreach ($oficio_localizacion_id as $key => $oficio) {
                    $oficio_to_save = new JuiciosOficio;
                    $oficio_to_save->juicio_id = $juicio_id;
                    $oficio_to_save->oficio_id = $oficio;
                    $oficio_to_save->recibido = $oficio_loc_recibido[$key];
                    $oficio_to_save->entregado = $oficio_loc_entregado[$key];
                    $oficio_to_save->contestado = $oficio_loc_contestado[$key];
                    $oficio_to_save->recordatorio_recibido = $oficio_loc_record_recibido[$key];
                    $oficio_to_save->recordatorio_entregado = $oficio_loc_record_entregado[$key];
                    $oficio_to_save->recordatorio_contestado = $oficio_loc_record_contestado[$key];
                    $oficio_to_save->da_domicilio = $oficios_loc_da_domicilio[$key];
                    $oficio_to_save->domicilio_dado = $oficios_loc_domicilio_dado[$key];
                    $oficio_to_save->domicilio_habilitado_autos = $oficios_loc_domicilio_habilitado[$key];
                    $oficio_to_save->diligenciado = $oficios_loc_diligenciado[$key];
                    $oficio_to_save->fecha_diligencia = $oficio_loc_fecha_diligencia[$key];
                    $oficio_to_save->resultado_diligencia = $oficio_loc_resultado_diligencia[$key];
                    $oficio_to_save->save();
                  }
                }

                if(!empty($notas)) {
                  foreach ($notas as $nota) {
                    $nota_to_save = new Nota;
                    $nota_to_save->nota = $nota;
                    $nota_to_save->juicio_id = $juicio_id;
                    $nota_to_save->user_id = Auth::user()->id;
                    $nota_to_save->save();
                  }
                }

                $juiciousuario_cliente = Juiciouser::where("juicio_id", $juicio_id)->where("role_id", 4)->first();
                $juiciousuario_cliente->user_name = $user_cliente->name;
                $juiciousuario_cliente->user_contact_info = $user_contact_info;
                $juiciousuario_cliente->user_id = $user_cliente->id;
                $juiciousuario_cliente->role_id = 4;
                $juiciousuario_cliente->save();

                $juiciousuario_colaborador = Juiciouser::where("juicio_id", $juicio_id)->where("role_id", 3)->first();
                $juiciousuario_colaborador->user_name = $user_colaborador->name;
                $juiciousuario_colaborador->role_id = 3;
                $juiciousuario_colaborador->user_id = $user_colaborador->id;
                $juiciousuario_colaborador->save();

                $juiciousuario_coordinador = Juiciouser::where("juicio_id", $juicio_id)->where("role_id", 2)->first();
                $juiciousuario_coordinador->user_name = $user_coordinador->name;
                $juiciousuario_coordinador->user_id = $user_coordinador->id;
                $juiciousuario_coordinador->role_id = 2;
                $juiciousuario_coordinador->save();

                $demandado = Demandado::where("juicio_id", $juicio_id)->where("codemandado", 0)->first();
                $demandado->name = $demandado_name;
                $demandado->save();

                if($codemandado_name != "") {
                    $codemandado = Demandado::where("juicio_id", $juicio_id)->where("codemandado", 1)->first();
                    if(!empty($codemandado)) {
                        $codemandado->name = $codemandado_name;
                        $codemandado->save();
                    } else {
                        $codemandado = new Demandado;
                        $codemandado->juicio_id = $juicio_id;
                        $codemandado->name = $codemandado_name;
                        $codemandado->codemandado = 1;
                        $codemandado->save();
                    }
                }

                $resultado = array('operacion' => true, 'message' => 'Juicio editado exitosamente', 'title' => 'Edición de Juicio', 'juicio_id' => $juicio_id, 'original_oficios_loc_da_domicilio' => $original_oficios_loc_da_domicilio);

              }

              return json_encode($resultado);

            } catch (Exception $e) {

                $resultado = array('operacion' => false, 'message' => $e->getMessage(), 'title' => 'Creación/Edición de Juicio');

                return json_encode($resultado);

            }

        }
    }

    public function enviarCorreoAUsuarios(Request $request){

      $emails = array($user_colaborador->email, 'sergioh81@gmail.com');

      $data = array('colaborador' => $user_colaborador, 'juicio' => $juicio, 'cliente' => $user_cliente);

      //from(config('app.senders.info.address'), config('app.senders.info.name'))
      Mail::send(['html' => 'emails.juicioEditado'], $data, function($msj) use ($emails) {
          $msj->from('sisjurcontrol@gmail.com');
          //$msj->from('facilposcorreo@gmail.com', $emails['from_name']);
          $msj->subject("SISJUR | Juicio Editado");
          $msj->to($emails);
      });

    }

    public function subirDocJuicio(Request $request) {

      $doc_tipo_id = $request->input("doc_tipo_id");
      $juicio_id = $request->input("juicio_id");

      if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {

          if($doc_tipo_id == 1) {
            $archivo = "fundatorios";
          } elseif ($doc_tipo_id == 2) {
            $archivo = "expediente";
          } else {
            $archivo = "otros";
          }
          $filename_fundatorio = $archivo."-".$juicio_id.".pdf";

          if($request->file('pdf_file')->storeAs($juicio_id, $filename_fundatorio, 'juicios')) {
              $documento = new DocJuicio;
              $documento->ruta_archivo = $filename_fundatorio;
              $documento->juicio_id = $juicio_id;
              $documento->doc_tipo_id = $doc_tipo_id;
              $documento->save();

              $resultado = array('exito' => true, 'ruta' => url("doc_juicios/".$juicio_id."/".$archivo."-".$juicio_id.".pdf"), 'doc_tipo_id' => $doc_tipo_id, 'juicio_id' => $juicio_id, 'redirect_url' => url("home"));

          } else {
              $resultado = array('exito' => false, 'message'=>'Ocurrió un error al intentar subir el archivo, intente nuevamente', $title=>'Carga de archivo');
          }
      } else {
        $resultado = array('exito' => false, 'message'=>'Ocurrió un error al intentar subir el archivo, intente nuevamente', $title=>'Carga de archivo');
      }

      return json_encode($resultado);

    }

    public function subirArchivo(Request $request) {

      $juicio_id = $request->input("juicio_id");
      $extension = $request->file('file')->extension();

      if ($request->hasFile('file') && $request->file('file')->isValid()) {

          $temp_file_name = "temp_file-".$juicio_id.".".$request->file('file')->extension();

          $otros_pdf = storage_path("app/juicios/".$juicio_id."/otros-".$juicio_id.".pdf");

          //$ruta = url("/img_temp/".$juicio_id."/".$request->file('file')->extension());
          $ruta = storage_path("app/temp_files/".$temp_file_name);
          //$ruta = url($temp_file_name);

          if($request->file('file')->storeAs("", $temp_file_name, 'temp_files')) {

            $mpdf = $this->MpdfObject();
            $mpdf->showImageErrors = true;

            try {

              if(file_exists($otros_pdf)) {

                $pagecount = $mpdf->SetSourceFile($otros_pdf);
                for ($i = 1; $i <= $pagecount; $i++) {
                  $tplId = $mpdf->ImportPage($i);
                  $mpdf->UseTemplate($tplId);
                  $mpdf->WriteHTML('<pagebreak />');
                }

              } else {

                $documento = new DocJuicio;
                $documento->ruta_archivo = "otros-".$juicio_id.".pdf";
                $documento->juicio_id = $juicio_id;
                $documento->doc_tipo_id = 3;
                $documento->save();

              }

              if($extension == "jpeg" || $extension == "jpg" || $extension == "png") {
                $mpdf->WriteHTML("<img width='100%' height='297cm' src='".$ruta."'/>");
              } elseif ($extension == "pdf") {
                $pagecount = $mpdf->SetSourceFile($ruta);
                for ($i = 1; $i <= $pagecount; $i++) {
                  $tplId = $mpdf->ImportPage($i);
                  $mpdf->UseTemplate($tplId);
                  $mpdf->WriteHTML('<pagebreak />');
                }
              }

              $mpdf->Output($otros_pdf, \Mpdf\Output\Destination::FILE);

              $resultado = array('exito' => true, 'ruta' => url("doc_juicios/".$juicio_id."/otros-".$juicio_id.".pdf"), 'tipo_doc' => 3);
            } catch (\Mpdf\MpdfException $e) {
              $resultado = array('exito' => false, 'error' => $e->getMessage());
            }

          }
      }

      return json_encode($resultado);
    }

    public function getDocuments($jucio_id, $doc_tipo_id) {

      if($doc_tipo_id == 1) {
        $path = storage_path("app/juicios/".$jucio_id."/fundatorios-".$jucio_id.".pdf");
      } elseif ($doc_tipo_id == 2) {
        $path = storage_path("app/juicios/".$jucio_id."/expediente-".$jucio_id.".pdf");
      } else {
        $path = storage_path("app/juicios/".$jucio_id."/otros-".$jucio_id.".pdf");
      }

      return response()->file($path);
    }

    public function getDocumentsThumb($juicio_id, $doc_tipo_id) {
        if($doc_tipo_id == 1) {
          $path = storage_path("app/juicios/".$juicio_id."/fundatorios-".$juicio_id.".pdf");
        } elseif ($doc_tipo_id == 2) {
          $path = storage_path("app/juicios/".$juicio_id."/expediente-".$juicio_id.".pdf");
        } else {
          $path = storage_path("app/juicios/".$juicio_id."/otros-".$juicio_id.".pdf");
        }

        $mpdf = $this->MpdfObject();
        try {

          if(file_exists($path)) {
            $pagecount = $mpdf->SetSourceFile($path);
            $tplId = $mpdf->ImportPage($pagecount);
            $mpdf->UseTemplate($tplId);
          }

          $ruta = storage_path("app/temp_files/temp_file_thumb-".$juicio_id."-doc_tipo_id-".$doc_tipo_id.".pdf");

          $mpdf->Output($ruta, \Mpdf\Output\Destination::FILE);

        } catch (\Mpdf\MpdfException $e) {
          $resultado = array('exito' => false, 'error' => $e->getMessage());
        }

        return response()->file($ruta);
    }

    public function getImageTemp($juicio_id, $extension) {


      $path = storage_path("app/temp_files/temp_file-".$juicio_id.".".$extension);

      return response()->file($path);
    }

    public function deleteDocument(Request $request) {

      $juicio_id = $request->input("juicio_id");
      $doc_tipo_id = $request->input("doc_tipo_id");

      try {
        $url_fund = storage_path('app/juicios/'.$juicio_id.'/fundatorios-'.$juicio_id.'.pdf');
        $url_expe = storage_path('app/juicios/'.$juicio_id.'/expediente-'.$juicio_id.'.pdf');
        $url_otro = storage_path('app/juicios/'.$juicio_id.'/otros-'.$juicio_id.'.pdf');
        if($doc_tipo_id == 1) {
          if(unlink($url_fund)) {
            $doc_juicio = DocJuicio::where('juicio_id', $juicio_id)->where("doc_tipo_id", $doc_tipo_id)->first();
            $doc_juicio->delete();
            $result = array('operacion' => true, 'message' => "exitoso", "doc_tipo_id" => $doc_tipo_id);
          } else {
            $result = array('operacion' => false, 'message' => $url_fund);
          }
        } elseif ($doc_tipo_id == 2) {
          if(unlink($url_expe)) {
            $doc_juicio = DocJuicio::where('juicio_id', $juicio_id)->where("doc_tipo_id", $doc_tipo_id)->first();
            $doc_juicio->delete();
            $result = array('operacion' => true, 'message' => "exitoso", "doc_tipo_id" => $doc_tipo_id);
          } else {
            $result = array('operacion' => false, 'message' => $url_expe);
          }
        } else {
          if(unlink($url_otro)) {
            $doc_juicio = DocJuicio::where('juicio_id', $juicio_id)->where("doc_tipo_id", $doc_tipo_id)->first();
            $doc_juicio->delete();
            $result = array('operacion' => true, 'message' => "exitoso", "doc_tipo_id" => $doc_tipo_id);
          } else {
            $result = array('operacion' => false, 'message' => $url_otro);
          }
        }

      } catch (Exception $e) {
        $result = array('operacion' => false, 'message' => "Falló");
      }

      return json_encode($result);

    }

    public function deleteNote(Request $request){
        $nota_id = $request->input('nota_id');
        $cant_notas = $request->input('cant_notas');
        try {
          $nota = Nota::where('id',$nota_id);
          if($nota->delete()) {
            $cant_notas = $cant_notas-1;
          }
          $resultado = array('operacion' => true, 'message'=> "Nota eliminada con éxito", 'title' => "Eliminar nota", "nota_id" => $nota_id, "cant_notas" => $cant_notas);
        } catch (Exception $e) {
          $resultado = array('operacion' => false, 'message'=> "Ocurrió un error al intentar eliminar la nota", 'title' => "Eliminar nota", "nota_id" => $nota_id);
        }
        return json_encode($resultado);
    }

    public function deleteOficio(Request $request){
        $juicio_oficio_id = $request->input('juicio_oficio_id');
        $cant_oficios = $request->input('cant_oficios');
        try {
          $oficio = JuiciosOficio::where('id',$juicio_oficio_id);
          if($oficio->delete()) {
            $cant_oficios = $cant_oficios - 1;
          }
          $resultado = array('operacion' => true,
                             'message'=> "Oficio eliminado con éxito", 'title' => "Eliminar oficio",
                             "juicio_oficio_id" => $juicio_oficio_id,
                             "cant_oficios" => $cant_oficios);
        } catch (Exception $e) {
          $resultado = array('operacion' => false,
                             'message'=> "Ocurrió un error al intentar eliminar el oficio",
                             'title' => "Eliminar nota",
                             "nota_id" => $nota_id);
        }
        return json_encode($resultado);
    }

    public function reporteJuicio($juicio_id) {

      $juicio  = Juicio::where('id', $juicio_id)->first();
      $juzgado = Juicio::find($juicio_id)->juzgado()->first();
      $juzgadotipo = Juicio::find($juicio_id)->juzgadotipo()->first();
      $juiciotipo = Juicio::find($juicio_id)->juiciotipo()->first();
      $juiciousers = Juicio::find($juicio_id)->juiciousers()->get();
      $macroetapa = Juicio::find($juicio_id)->macroetapa()->first();
      $demandados = Juicio::find($juicio_id)->demandados()->get();
      $documentos = Juicio::find($juicio_id)->doc_juicios()->get();
      $notas = Juicio::find($juicio_id)->notas()->get();
      $estado = Juicio::find($juicio_id)->estado()->first();
      $salaapela = Juicio::find($juicio_id)->salaapela()->first();
      $moneda = Juicio::find($juicio_id)->moneda()->first();

      foreach ($juiciousers as $juiciouser) {
        if ($juiciouser->role_id == 2) {
          $coordinador = $juiciouser->user()->first();
        }
        elseif($juiciouser->role_id == 3) {
          $colaborador = $juiciouser->user()->first();
        }
        elseif($juiciouser->role_id == 4) {
          $cliente = $juiciouser;
        }
      }

      foreach ($demandados as $key => $demand) {
        if($demand->codemandado == 1)
          $codemandado = $demand;
        else
          $demandado = $demand;
      }

      if (!isset($codemandado)) {
        $codemandado = new stdClass;
        $codemandado->name = "";
      }

      $doc_tipos = DocTipo::all();

      $mpdf = $this->MpdfObject();

      $html = view("reportes.reporteJuicio")->with('juicio', $juicio)
                                            ->with('moneda', $moneda)
                                            ->with('estado', $estado)
                                            ->with('colaborador', $colaborador)
                                            ->with('juzgado', $juzgado)
                                            ->with('juzgadotipo', $juzgadotipo)
                                            ->with('juiciotipo', $juiciotipo)
                                            ->with('cliente', $cliente)
                                            ->with('macroetapa', $macroetapa)
                                            ->with('demandado', $demandado)
                                            ->with('codemandado', $codemandado)
                                            ->with('documentos', $documentos)
                                            ->with('doc_tipos', $doc_tipos)
                                            ->with('coordinador', $coordinador)
                                            ->with('salaapela', $salaapela)
                                            ->with('notas', $notas);
      $mpdf->WriteHTML($html);
      $mpdf->Output("reporte_juicio_".$juicio_id.".pdf", \Mpdf\Output\Destination::FILE);
      return response()->file("reporte_juicio_".$juicio_id.".pdf");
    }

    public function unirAExpediente($juicio_id) {

      try {

        $juicio = Juicio::where("id", $juicio_id)->first();

        if(!empty($juicio)) {
          $mpdf = $this->MpdfObject();

          $otros_pdf = storage_path("app/juicios/".$juicio->id."/otros-".$juicio->id.".pdf");
          $expediente_pdf = storage_path("app/juicios/".$juicio->id."/expediente-".$juicio->id.".pdf");

          if(file_exists($expediente_pdf)) {
              $pagecount = $mpdf->SetSourceFile($expediente_pdf);
              for ($i = 1; $i <= $pagecount; $i++) {
                $tplId = $mpdf->ImportPage($i);
                $specs = $mpdf->getTemplateSize($tplId);
                $mpdf->addPage($specs['orientation']);
                $mpdf->UseTemplate($tplId);
                //$mpdf->SetPageTemplate($tplId);
                //$mpdf->addPage();
              }
          }

          if(file_exists($otros_pdf)) {
              $pagecount = $mpdf->SetSourceFile($otros_pdf);
              for ($i = 1; $i <= $pagecount; $i++) {
                $tplId = $mpdf->ImportPage($i);
                $specs = $mpdf->getTemplateSize($tplId);
                $mpdf->addPage($specs['orientation']);
                $mpdf->UseTemplate($tplId);
                //$mpdf->SetPageTemplate($tplId);
                //$mpdf->addPage();
              }
          }

          if (file_exists($otros_pdf) || file_exists($expediente_pdf)) {
              $mpdf->Output($expediente_pdf, \Mpdf\Output\Destination::FILE);
              if(file_exists($otros_pdf) && unlink($otros_pdf)) {
                  $doc_juicio = DocJuicio::where('juicio_id', $juicio->id)->where("doc_tipo_id", 3)->first();
                  $doc_juicio->delete();
              }
          }

          $resultado = array('operacion' => true, 'message' => 'Se han adicionado el archivo temporal al expediente del juicio', 'title' => 'Unir Archivos a Expediente');
        } else {
          $resultado = array('operacion' => false, 'error_message' => 'Este juicio no existe', 'title' => 'Error al intentar unir juicio');
        }
      } catch (Exception $e) {
        $resultado = array('operacion' => false, 'error_message' => 'Ocurrió un error al intentar unir los archivos', 'title' => 'Error al intentar unir juicio', 'error' => $e->getMessage());
      }
      Session::flash('resultado', json_encode($resultado));
      return redirect("home");
    }

    public function deleteJuicio($juicio_id) {

      try {
        $juicio = Juicio::where("id", $juicio_id)->first();

        if(!empty($juicio)) {

          $juicio->delete();

          $resultado = array('operacion' => true, 'message' => 'Se ha eliminado correctamente el juicio', 'title' => 'Eliminar juicio');
        } else {
          $resultado = array('operacion' => false, 'error_message' => 'Este juicio no existe', 'title' => 'Error al intentar eliminar juicio');
        }
      } catch (Exception $e) {
        $resultado = array('operacion' => false, 'error_message' => 'Ocurrió un error al intentar eliminar el juicio', 'title' => 'Error al intentar eliminar juicio', 'error' => $e->getMessage());
      }
      Session::flash('resultado', json_encode($resultado));
      return redirect("home");
    }

    public function historicoJuicios() {

      $estados = Estado::all();

        $user = \Auth::user();

        if($user->hasRole('administrador')) {
            $juicios = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
        } elseif ($user->hasRole('coordinador')) {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "coordinador"){
                        return true;
                    }
                }
            });
        } elseif ($user->hasRole('colaborador')) {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "colaborador"){
                        return true;
                    }
                }
            });
        } else {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "cliente"){
                        return true;
                    }
                }
            });
        }

        return view('home')->with("juicios", $juicios)
                           ->with("estados", $estados);
    }
}
